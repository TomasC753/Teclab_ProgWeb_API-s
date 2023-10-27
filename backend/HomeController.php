<?php
namespace backend;

use backend\core\Controller;

class HomeController extends Controller {
    public function index()
    {
        $this->view("home");
    }
}