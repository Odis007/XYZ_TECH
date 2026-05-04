<?php
    class ProductManager extends Model
    {
        public function getProducts() {
            return $this -> getAll('produit', 'Product');
        }

        public function getProduct($id) {
            $var = [];
            $req = $this -> getBdd() -> prepare('SELECT produit.*, categorie.libelle AS categorie FROM produit 
            INNER JOIN categorie ON produit.id_categorie = categorie.id_categorie WHERE produit.id_produit ='.$id);
            $req -> execute();

            while($data = $req -> fetch(PDO::FETCH_ASSOC)) {
                $var[] = new Product($data);
            }
            $req -> closeCursor();
            return $var;
        }

        public function getLastProducts() {
            $var = [];
            $req = $this -> getBdd() -> prepare('SELECT produit.*, categorie.libelle AS categorie FROM produit INNER JOIN categorie 
            ON produit.id_categorie = categorie.id_categorie ORDER BY id_produit DESC LIMIT 4');
            $req -> execute();

            while($data = $req -> fetch(PDO::FETCH_ASSOC)) {
                $var[] = new Product($data);
            }
            $req -> closeCursor();
            return $var; 
        }

        public function getFiltProducts(array $criteres) {
            $var = [];
            $sql = "SELECT produit.*, categorie.libelle AS categorie FROM produit INNER JOIN categorie 
            ON produit.id_categorie = categorie.id_categorie WHERE 1=1";

            if (!empty($criteres['categorie'])) {
                $sql .= " AND categorie.libelle = '" . $criteres['categorie'] . "'";
            }

            if (!empty($criteres['prix_max'])) {
                $sql .= " AND produit.prix <= " . $criteres['prix_max'];
            }

            $sql .= " ORDER BY id_produit DESC";
            $req = $this -> getBdd() -> prepare($sql);
            $req -> execute();

            while ($data = $req -> fetch(PDO::FETCH_ASSOC)) {
                $var[] = new Product($data);
            }
            $req -> closeCursor();
            return $var;
        }
    }

?>