<?php
namespace Core\Auth\Domain;

use Illuminate\Support\Facades\Hash;

class UserAuth{

    private string $email;
    private string $password;
    private string $name;

    public function __construct(string $email, string $password,string $name)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
    }

    public static function hashPassword(string $password){
        return Hash::make($password);
    }

    public function verifyPassword($password){
        return Hash::check($password,$this->password);
    }

    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getName(){
        return $this->name;
    }

}