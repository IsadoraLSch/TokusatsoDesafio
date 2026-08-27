<?php
class User {
    public function findByEmail($email){
        if($email === 'demo@tokusatsumania.com') {
            return ['id'=>1, 'email'=>$email, 'password'=>password_hash('123456', PASSWORD_DEFAULT)];
        }
        return null;
    }

    public function create($data) {
        return true;
    }
}