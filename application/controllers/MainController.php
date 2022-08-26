<?php

namespace application\controllers;

use \Controller;

class MainController extends Controller
{
    // public function __construct()
    // {
    //     if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    //         $this->redirect('/login');
    //     }
    // }

    public function template($viewName, $bc = '', $data = array())
    {
        $view = $this->view('users/template');
        $view->bind('viewName', $viewName);
        $view->bind('breadcrumb', $bc);
        $view->bind('data', $data);
    }

    public function homepage()
    {
        $this->view('homepage');
    }
}
