<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

/**
 * Class SiteController
 * 
 * @author Rémy Pelletier <remypelletier2@gmail.com>
 * @package app\controllers
 */
class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'Rémy'
        ];

        return $this->render('home', $params);
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function handleContact(Request $request)
    {
        if ($request->isPost()) {

        }
        if ($request->isGet()) {

        }
        var_dump($request->getBody());
    }
}