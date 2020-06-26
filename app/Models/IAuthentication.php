<?php namespace App\Models;


interface IAuthentication
{
    public function authenticate(array $credential) : void;
    public function isAuthenticated() : bool;
}