<?php
namespace Core\Auth\Domain;

interface AuthServiceInterface{

    function signin(string $email, string $password) : array;

    function register(UserAuth $userAuth) : bool;
}