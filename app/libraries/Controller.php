<?php

// Core controller class
// Loads views and models

class Controller{

    // Load model
    public function model($model) {
        require_once APPROOT . '/models/' . $model . '.php';
        return new $model();
    }

    // Load view
    public function view($view, $data = []) {
        $view_file = APPROOT . '/views/' . $view . '.php';
        if (file_exists($view_file)) {
            require_once $view_file;
        } else {
            echo 'View does not exist';
        }
    }
}
