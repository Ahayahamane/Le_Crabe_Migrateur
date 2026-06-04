<?php

namespace app\middleware;

class CheckRoleMiddleware
{
    /**
     * Vérifie les droits d'accès avant l'exécution du contrôleur.
     *
     * @param array|null $required_roles Tableau de rôles autorisés
     *                                   ou null si public.
     */
    public static function check(?array $required_roles): void
    {
        
        if ($required_roles === null || empty($required_roles)) {
            return;
        }
        

        if (!isset($_SESSION['user'])) {
            $_SESSION["message"] .= "Vous devez vous connecter pour acceder a cette fonction";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $user_role = $_SESSION['user']->get('role') ?? 0;
        
        if (!in_array($user_role, $required_roles, true)) {
            $_SESSION["message"] .= "vous ne disposez pas des droit pour acceder a catte fonctionnalitée";
            header('Location: ?path=accueil');
            exit;
        }
    }
}