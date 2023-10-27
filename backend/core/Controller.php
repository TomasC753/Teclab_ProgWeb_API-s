<?php

namespace backend\core;

class Controller {
    public function view($view)
    {
        include "views/$view.php";
    }

    public function backendView($view)
    {
        include "backend/views/$view.php";
    }

}