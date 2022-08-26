<?php

namespace application\controllers;

use \Controller;

class DashboardMainController extends Controller
{
    public function __construct()
    {
        if (empty($_SESSION['user']['username']) and empty($_SESSION['user']['password'])) {
            $this->redirect('login');
        }
    }

    public function template($viewName, $bc = '', $data = array())
    {
        $view = $this->view('dashboard/template');
        $view->bind('viewName', $viewName);
        $view->bind('breadcrumb', $bc);
        $view->bind('data', $data);
    }
}
