<?php

namespace app\controllers;

use app\core\Controller;

/**
 * Class AuthController
 * 
 * @author Rémy Pelletier <remypelletier2@gmail.com>
 * @package app\controllers
 */
class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register()
    {
        return $this->render('register');
    }

    public function handleLogin()
    {
        return 'handle Login';
    }

    public function handleRegister()
    {
        return 'handle Register';
    }

}