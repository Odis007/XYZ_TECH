<?php
    class ControllerProduct
    {
        private $_productManager;
        private $_view;

        public function __construct($url) {
            if (isset($url) && count($url) > 3)
                throw new Exception('Page introuvable');
            else
                $this -> product($url);
        }

        private function product($url) {
            $this -> _productManager = new ProductManager;
            $product = $this -> _productManager -> getProduct($url[2]);

            require_once('views/viewProduct.php');
        }

    } 

?>