<?php

namespace App\controller\tools;

use App\controller\AbstractController;
use App\model\MediaModel;

class MediaController extends AbstractController
{

    private array $config;
    public array $errors = [];
    private $ext;
    private $media_type;
    private $tmp_name;
    private $type_config;
    public $path;

    /**
     * Constante privée : Définition des types de médias supportés.
     * Clé : Nom du type ('image', 'video', 'json').
     * Valeur : Tableau associatif avec :
     *   - 'extensions' : Liste des extensions de fichiers autorisées.
     *   - 'mime_prefix' : Préfixe du type MIME attendu pour la sécurité.
     *   - 'folder' : Nom du sous-dossier dans /public où stocker le fichier.
     */
    private const TYPES = [
        'image' => ['extensions' => ['jpg', 'jpeg', 'png', 'gif', 'webp'], 'mime_prefix' => 'image/', 'folder' => 'img'],
        'video' => ['extensions' => ['mp4', 'webm', 'ogg', 'mov'], 'mime_prefix' => 'video/', 'folder' => 'video'],
        'json'  => ['extensions' => ['json'], 'mime_prefix' => 'application/json', 'folder' => 'json']
    ];

    const table_name = 'media';

    /**
     * Constructeur de la classe.
     * Initialisation des propriétés avec les valeurs fournies.
     *
     * @param string $publicRoot Chemin absolu vers le dossier public du site.
     */
    public function __construct()
    {
        $this->config = self::TYPES;
    }



    /**
     * Méthode principale : Traite l'upload, la validation, le déplacement et l'enregistrement en BDD.
     *
     * @param array $file Tableau $_FILES['media_file'] contenant les infos du fichier uploadé.
     * @param string|null $description Description optionnelle fournie par l'utilisateur.
     * @return array Tableau de résultat avec 'success', 'data' (si ok) ou 'errors' (si échec).
     */
    public function validate_media(array $file)
    {
        
        $this->errors = [];
        if (!isset($file['tmp_name'])) {
            $this->errors['file'][] = "Aucun fichier valide reçu.";
            return $this->errors;
        }

        if ($file['error'] !== UPLOAD_ERR_OK) {
            $this->errors['file'][] = "Erreur système d'upload (Code: {$file['error']}).";
            return $this->errors;
        }

        $this->tmp_name = $file['tmp_name'];
        $this->ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $this->media_type = $this->detectType();

        if (!$this->media_type) {
            $this->errors['file'][] = "Format de fichier non supporté. Accepté : " . implode(', ', array_keys(self::TYPES));
            return $this->errors;
        }
        $this->type_config = $this->config[$this->media_type];

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $real_mime_type = finfo_file($finfo, $this->tmp_name);

        if ($this->media_type === 'json') {
            $content = file_get_contents($this->tmp_name);
            json_decode($content);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $this->errors['file'][] = "Le fichier JSON est invalide.";
                return $this->errors;
            }
        } else {
            if (strpos($real_mime_type, $this->type_config['mime_prefix']) !== 0) {
                $this->errors['file'][] = "Le contenu du fichier ne correspond pas au format {$this->media_type}.";
                return $this->errors;
            }
        }


        return $this->errors;
    }

    public function register_media()
    {
        $unique_name = $this->generateUniqueName($this->ext);
        $target_path = MEDIAS . '/' . $this->type_config['folder'] . '/' . $unique_name;

        if (!move_uploaded_file($this->tmp_name, $target_path)) {
            $this->errors['file'][] = "Échec de l\'enregistrement du fichier.";
        } else {
            $datas = [
                'type' => $this->media_type,
                'path' => '/' . $this->type_config['folder'] . '/' . $unique_name,
                'name' => $unique_name,
            ];
            $media_model = new MediaModel;
            $media_model->register_media($datas);
            
            $this->path = $datas['path'];
        }

        
        return $this->errors;
    }

    /**
     * Détecte le type de média en fonction de l'extension du fichier.
     *
     * @param string $ext Extension du fichier (ex: 'jpg', 'mp4').
     * @return string|null Le type ('image', 'video', 'json') ou null si inconnu.
     */
    private function detectType()
    {

        foreach ($this->config as $type => $conf) {
            if (in_array($this->ext, $conf['extensions'])) {
                return $type;
            }
        }
        return null;
    }

    /**
     * Génère un nom de fichier unique basé sur l'extension.
     * Utilise uniqid() et time() pour garantir l'unicité et éviter les collisions.
     *
     * @param string $ext Extension du fichier.
     * @return string Le nouveau nom de fichier (ex: med_66a1b2_1712345678.jpg).
     */
    private function generateUniqueName()
    {
        return uniqid('media', true) . '_' . time() . '.' . $this->ext;
    }

    public function get_path(){
        return $this->path;
    }
}
