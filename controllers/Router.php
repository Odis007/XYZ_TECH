<?php
    class Router
    {
        private $_ctrl;
        private $_view;
        
        public function routerReq()
        {
            try
            {
                spl_autoload_register(function($class){
                    $dossiers = ['models/', 'controllers/', 'views/']; 

                    foreach($dossiers as $dossier) {
                        $fichier = $dossier . $class . '.php';
        
                        if(file_exists($fichier)) {
                            require_once($fichier);
                            return;
                        } 
                    }
                });

                $url = []; 

                if(isset($_GET['url'])) {
                    $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

                    $controller = ucfirst(strtolower($url[0]));
                    $controllerClass = "Controller".$controller;
                    $controllerFile = "controllers/".$controllerClass.".php";

                    if(file_exists($controllerFile)) {
                        require_once($controllerFile);
                        $this -> _ctrl = new $controllerClass($url);
                    }
                    else 
                        throw new Exception('Page introuvable');
                }
                else {
                    require_once('controllers/ControllerAccueil.php');
                    $this -> _ctrl = new ControllerAccueil($url);
                }
            }
            catch(Exception $e) {
                $errorMsg = $e -> getMessage();
                require_once('views/viewError.php');
            }
        }
    }   
?>