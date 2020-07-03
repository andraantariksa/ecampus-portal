<?php
namespace App\Controllers\Authentication;

interface IAuthentication
{
    public static function getInstance() : self;
    public function authenticate(array $credential) : void;
    public function isAuthenticated() : bool;
}