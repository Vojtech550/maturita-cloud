<?php

namespace App\Controllers;

class Auth extends \IonAuth\Controllers\Auth
{
    /**
     * If you want to customize the views,
     *  - copy the ion-auth/Views/auth folder to your Views folder,
     *  - remove comment
     */
     protected $viewsFolder = 'auth';

    public function login($page = 'login'){
        echo view('templates/header', $data);
        echo view('pages/'.$page, $data);
        echo view('templates/footer', $data);
    }
}