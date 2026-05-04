<?php
    class ControllerAccueil
    {
        private $_productManager;
        private $_view;

        public function __construct($url) {
            if (isset($url) && count($url) > 1)
                throw new Exception('Page introuvable');
            else
                $this -> product();
        }

        private function product() {
            $this -> _productManager = new ProductManager;
            $product = $this -> _productManager -> getLastProducts();

            require_once('views/viewAccueil.php');
        }

    } 

?>