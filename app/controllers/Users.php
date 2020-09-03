<?php

class Users extends Controller{
    public function __construct(){
        $this->userModel = $this->model('User');

    }

    public function login(){

        // Check for posts
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_error' => '',
                'password_error' => ''
            ];

            // Validate email
            if(empty($data['email'])){
                $data['email_error'] = 'Please enter email';
            }

            // Validate pass
            if(empty($data['password'])){
                $data['password_error'] = 'Please enter password';
            }

            // Check for user email
            if ($this->userModel->findUserByEmail($data['email'])) {

                // User found
            } else {
                $data['email_error'] = 'No user found';
            }

            // Make sure errors are empty
            if (empty($data['email_error']) && empty($data['password_error'])) {

                // Validated

                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {

                    // Create session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_error'] = 'Password entered incorrectly';
                    $this->view('users/login', $data);
                }
            } else {

                // Load view with errors
                $this->view('users/login', $data);
            }

            // Process form
            } else {

            // Init data
            $data = [
                'email' => '',
                'password' => '',
                'email_error' => '',
                'password_error' => ''
            ];

            // Load view
            $this->view('users/login', $data);
        }
    }
    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('posts');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }
}
