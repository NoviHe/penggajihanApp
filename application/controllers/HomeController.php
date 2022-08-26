<?php

use application\controllers\MainController;

class HomeController extends MainController
{
    public function index()
    {
        $this->homepage();
    }
}
