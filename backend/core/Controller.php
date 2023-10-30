<?php

namespace backend\core;

class Controller {
    public function view(string $view, array $data = [])
    {
        extract($data);
        include "views/$view.php";
    }

    public function backendView(string $view, array $data = [])
    {
        extract($data);
        include "backend/views/$view.php";
    }

    public function redirect(string $url)
    {
        header("Location: $url");
    }

    public function back($message = "")
    {
        header($_SERVER['HTTP_REFERER']."?message=$message");
    }
}