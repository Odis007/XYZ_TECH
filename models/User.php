<?php
    class User
    {
        private $_id_utilisateur;
        private $_nom;
        private $_prenom;
        private $_email;
        private $_mot_de_passe;
        private $_role;

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
        public function setId_utilisateur($id) {
            $id = (int)$id;

            if($id > 0)
                $this -> _id_utilisateur = $id;
        }

        public function setNom($nom) {
            if(is_string($nom))
                $this -> _nom = $nom;
        }

        public function setPrenom($prenom) {
            if(is_string($prenom))
                $this -> _prenom = $prenom;
        }

        public function setEmail($email) {
            if(is_string($email))
                $this -> _email = $email;
        }

        public function setMot_de_passe($mot_de_passe) {
            if(is_string($mot_de_passe))
                $this -> _mot_de_passe = $mot_de_passe;
        }

        public function setRole($role) {
            if(is_string($role))
                $this -> _role = $role;
        }

        //GETTERS
        public function getId() {
            return $this -> _id_utilisateur;
        }

        public function getNom() {
            return $this -> _nom;
        }

        public function getPrenom() {
            return $this -> _prenom;
        }

        public function getEmail() {
            return $this -> _email;
        }

        public function getMot_de_passe() {
            return $this -> _mot_de_passe;
        }

        public function getRole() {
            return $this -> _role;
        }
    }

?>