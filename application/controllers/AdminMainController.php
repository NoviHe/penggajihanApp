<?php

namespace application\controllers;

use \Controller;

class AdminMainController extends Controller
{
    public function __construct()
    {
        if (empty($_SESSION['super_admin']['username']) and empty($_SESSION['super_admin']['password'])) {
            $this->redirect('admin/login');
        }
    }

    public function template($viewName, $bc = '', $data = array())
    {
        $view = $this->view('admin/template');
        $view->bind('viewName', $viewName);
        $view->bind('breadcrumb', $bc);
        $view->bind('data', $data);
    }
}
