<?php 
namespace Core\Auth\Domain;

use App\Models\User;

interface UserRepositoryInterface{

    function findUserByEmail(string $email) : User;

    function save(UserAuth $userAuth) : bool;

}