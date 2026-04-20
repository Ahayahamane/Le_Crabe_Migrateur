<?php

namespace App\class;

class Validator
{

    private array $datas;
    public array $errors;

    public function __construct(array $datas)
    {

        $this->datas = $datas;

        
        if (!empty(($_FILES['json_data_file']['tmp_name']))) {
            $this->datas['json_data_file'] = file_get_contents($_FILES['json_data_file']['tmp_name']);
        } else {
            '';
        };
        
    }

    /**
     * parcourt les règles de validation définies et applique
     * les vérifications appropriées à chaque champ du formulaire.
     *
     * @param array $rules Tableau associatif contenant les règles de validation.
     *                     Structure : ['nom_du_champ' => ['règle1', 'règle2', ...]]
     *                     Exemple : ['email' => ['required', 'email'], 'password' => ['required', 'min:8']]
     *
     * @return array Tableau associatif contenant les erreurs pour chaque champ.
     *               Structure : ['nom_du_champ' => ['Message d'erreur 1', 'Message d'erreur 2', ...]]
     *               Retourne un tableau vide si aucune erreur n'est détectée.
     */
    public function validate(array $rules)
    {
        $this->errors = [];
        foreach ($rules as $name => $rules_array) {
            if (array_key_exists($name, $this->datas)) {
                foreach ($rules_array as $rule) {
                    switch (true) {
                        case $rule === 'required':
                            $this->required($name, $this->datas[$name]);
                            break;
                        case substr($rule, 0, 3) === 'min':
                            $this->min($name, $this->datas[$name], $rule);
                            break;
                        case substr($rule, 0, 3) === 'max':
                            $this->max($name, $this->datas[$name], $rule);
                            break;
                        case $rule === 'email':
                            $this->mail($name, $this->datas[$name]);
                            break;
                        case $rule === 'int':
                            $this->int($name, $this->datas[$name]);
                            break;
                        case $rule === 'img':
                            $this->img($name, $this->datas[$name]);
                            break;
                        case $rule === 'date':
                            $this->date($name, $this->datas[$name]);
                            break;
                    }
                }
            }
        }
        return $this->errors;
    }


    /**
     *verifie la presence d'un champ et son association à une valeur
     *
     *@param string $name Nom du champ
     *                    Exemple: 'email'
     *
     *@param string $value Valeur associé au champ
     *                     Exemple: Toto@mail.fr
     *
     *Ajoute un association au tableau des erreurs de l'objet
     *composé du nom du champ comme clef et d'un message decrivant l'erreur comme valeur
     *   Exemple ['email'=> "email doit etre renseigné"]
     */
    public function required(string $name, string $value)
    {
        $value = trim($value);
        if (!isset($value) || is_null($value) || empty($value)) {
            $this->errors[$name][] = "{$name} doit etre renseigné";
        }
    }

    /**
     *Les fonctions suivantes utilisent toutes les mêmes paramètres suivants:
     *
     *@param string $name Nom du champ
     *@param string $value Valeur associé au champ
     *@param string $rule Régle d'ou est extraite la longeur de référence
     *
     *Ajoute un association au tableau des erreurs de l'objet
     *composé du nom du champ comme clef et d'un message decrivant l'erreur comme valeur
     */

    /**
     * Fonction de vérification de la longeur minimale d'une chaine
     */
    public function min(string $name, string $value, string $rule)
    {
        //recupération du nombre min de caracteres voulus 
        //(dynamiquement)(les digits présent dans la regle)
        //(sous forme de chaine)
        preg_match_all('/(\d+)/', $rule, $matches);
        $limit = (int) $matches[0][0];
        if (strlen($value) < $limit) {
            $this->errors[$name][] = "{$name} doit comporter plus de {$limit} characteres";
        }
    }

    /**
     * Fonction de vérification de la longeur maximale d'une chaine
     */
    public function max(string $name, string $value, string $rule)
    {

        preg_match_all('/(\d+)/', $rule, $matches);
        $limit = (int) $matches[0][0];
        if (strlen($value) > $limit) {
            $this->errors[$name][] = "{$name} doit comporter moin de {$limit} characteres";
        }
    }

    /**
     * Fonction de vérification du format d'une chaine pour correspondre à une adresse mail
     */
    public function mail(string $name, string $value)
    {
        if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $value)) {
            $this->errors[$name][] = "Format invalide";
        }
    }

    /**
     * Fonction de validation du type d'une variable (integer)
     */
    public function int(string $name, string $value)
    {
        if (!preg_match('/^\d+$/', $value)) {
            $this->errors[$name][] = "Cette information doit etre composé de chiffres uniquement";
        }
    }

    /**
     * Fonction de validation du format d'un fichier pour correspondre à une image
     */
    public function img(string $name, string $value)
    {
        if (!preg_match('/\.(jpg|jpeg|png)$/', $value)) {
            $this->errors[$name][] = "Votre image doit etre au format jpg, jpeg ou png";
        }
    }

    /**
     * Fonction de validation du format d'une date
     */
    public function date(string $name, string $value)
    {
        if (!preg_match('/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/', $value)) {
            $this->errors[$name][] = "Votre date doit etre au format AAAA-MM-JJ";
        }
    }

    /**
     * Fonction de validation du format d'un fichier pour correspondre à un fichier json
     */
    public function json(string $name, string $value)
    {
        try {
            $data = json_decode($value, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            $this->errors[$name][] = "Votre fichier json est erroné(" . $e->getMessage() . ")";
        }
    }
}
