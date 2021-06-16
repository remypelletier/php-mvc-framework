<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

/**
 * Class AuthController
 * 
 * @author Rémy Pelletier <remypelletier2@gmail.com>
 * @package app\controllers
 */
class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isPost()) {
            return 'handle login';
        }
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $registerModel = new RegisterModel();
        if ($request->isPost()) {
            $registerModel->loadData($request->getBody());
            if ($registerModel->validate() && $registerModel->register()) {
                return 'success';
            }
            return $this->render('register', [
                'model' => $registerModel
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);
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