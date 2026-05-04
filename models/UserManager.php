<?php
    class UserManager extends Model
    {
        public function getUsers() {
            return $this -> getAll('utilisateur', 'User');
        }

         public function getUserByEmail($email) 
        {
            $req = $this -> getBdd() -> prepare ("SELECT * FROM utilisateur WHERE email = '" . $email . "'");
            $req->execute();

            $data = $req->fetch(PDO::FETCH_ASSOC);
            $req->closeCursor();

            if ($data) {
                return new User($data);
            }
            return null; 
        }

    }
?>