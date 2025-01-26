<?php
namespace Core\Auth\Infrastructure;

use App\Models\Role;
use App\Models\User;
use Core\Auth\Domain\UserAuth;
use Core\Auth\Domain\UserRepositoryInterface;
use Exception;

class UserRepository implements UserRepositoryInterface{
    
    public function findUserByEmail(string $email) : User{
        $user =  User::whereEmail($email)->first();
        if($user){
            return $user;
        }
        throw new Exception("User not found");
    }

    public function save(UserAuth $userAuth) : bool{
        try{
            $defaultRole = Role::whereName('free')->first();
            User::create([
                'name' => $userAuth->getName(),
                'email' => $userAuth->getEmail(),
                'password' => $userAuth->getPassword(),
                'role_id' => $defaultRole->id,
            ]);
            return true;
        }catch(Exception $e){
            return false;
        }
    }
    

}
