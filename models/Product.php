<?php
    class Product
    {
        private $_id_produit;
        private $_id_categorie;
        private $_categorie;
        private $_nom;
        private $_date_ajout;
        private $_annee;
        private $_prix;
        private $_stock;
        private $_image;

        public function __construct(array $data) {
            $this -> hydrate($data);
        }

        public function hydrate (array $data) {
            foreach($data as $key => $value) {
                $method = 'set'.ucfirst($key);

                if(method_exists($this, $method))
                    $this -> $method($value);
            }
        }

        //SETTERS
        public function setId_produit($id) {
            $id = (int)$id;

            if($id > 0)
                $this -> _id_produit = $id;
        }

        public function setId_categorie($id) {
            $id = (int)$id;

            if($id > 0)
                $this -> _id_categorie = $id;
        }

        public function setCategorie($categorie) {
            if(is_string($categorie))
                $this -> _categorie = $categorie;
        }

        public function setNom($nom) {
            if(is_string($nom))
                $this -> _nom = $nom;
        }

        public function setDate_ajout($date) {
                $this -> _date_ajout = $date;
        }

        public function setAnnee($annee) {
            if(is_string($annee))
                $this -> _annee = $annee;
        }

        public function setPrix($prix) {
                $this -> _prix = $prix;
        }

        public function setStock($stock) {
            $stock = (int) $stock;
                $this -> _stock = $stock;
        }

        public function setImage($image) {
            if(is_string($image))
                $this -> _image = $image;
        }

        //GETTERS
        public function getId_produit() {
            return $this -> _id_produit;
        }

        public function getId_categorie() {
            return $this -> _id_categorie;
        }

        public function getCategorie() {
            return $this -> _categorie;
        }

        public function getNom() {
            return $this -> _nom;
        }

        public function getPrix() {
            return $this -> _prix;
        }

        public function getDate_ajout() {
            return $this -> _date_ajout;
        }

        public function getAnnee() {
            return $this -> _annee;
        }

        public function getStock() {
            return $this -> _stock;
        }

        public function getImage() {
            return $this -> _image;
        }
    }

?>