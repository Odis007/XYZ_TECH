<?php
    class ControllerCatalogue
    {
        private $_productManager;
        private $_view;

        public function __construct($url) {
            if (isset($url) && count($url) > 1)
                throw new Exception('Page introuvable');
            else
                $this -> catalogue();
        }

        private function catalogue() {
            $this -> _productManager = new ProductManager;
            $criteres = [];

            if (isset($_GET['categorie']) && $_GET['categorie'] !== '') {
                $criteres['categorie'] = htmlspecialchars($_GET['categorie']);
            }

            if (isset($_GET['prix_max']) && is_numeric($_GET['prix_max'])) {
                $criteres['prix_max'] = (float) $_GET['prix_max'];
            }

            $product = $this -> _productManager -> getFiltProducts($criteres);

            require_once('views/viewCatalogue.php');
        }

    } 

?>