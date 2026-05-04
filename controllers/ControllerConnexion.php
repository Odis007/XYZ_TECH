<?php

class ControllerConnexion 
{
    private $_userManager;

    public function __construct($url) 
    {
        if (isset($url) && count($url) > 2) {
            throw new Exception('Page introuvable');
        } 
        else if (isset($url[1]) && $url[1] == 'authentifier') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this -> authentifier();
            } else {
                $this -> afficherConnexion();
            }
        }
        else {
            $this -> afficherConnexion();
        }
    }

    private function afficherConnexion() 
    {
        require_once('views/viewConnexion.php');
    }

    private function authentifier() 
    {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            
            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password'];

            $this -> _userManager = new UserManager();
            $user = $this -> _userManager-> getUserByEmail($email);

            if ($user !== null) {
                if ($password === $user -> getMot_de_passe()) {
                    
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    
                    $_SESSION['user_id'] = $user -> getId();
                    $_SESSION['user_prenom'] = $user -> getPrenom();
                    
                    header('Location: index.php');
                    exit();
                } else {
                    $erreur = "Identifiants incorrects.";
                }
            } else {
                $erreur = "Identifiants incorrects.";
            }
        } else {
            $erreur = "Veuillez remplir tous les champs.";
        }

        require_once('views/viewConnexion.php');
    }
}
?>