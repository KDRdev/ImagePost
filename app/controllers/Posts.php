<?php

class Posts extends Controller{
    public function __construct() {
        $this->postModel = $this->model('Post');
    }
    public function list() {

        if (!isLoggedIn()){
            redirect('users/login');
        }
        $posts = $this->postModel->getPosts();

        $data = [
        'posts' => $posts
        ];

        $this->view('posts/index', $data);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if (isset($_POST['firstname']) || (isset($_POST['lastname'])) || isset($_POST['filename'])) {
                $pass = true;
                $firstname_err = '';
                $file_type_err = '';
                $file_size_err = '';
                $upload_err = '';
                $filename = NULL;

                // Make sure firstname is not empty
                if (empty($_POST['firstname'])) {
                    $pass = false;
                    $firstname_err = 'First Name cannot be empty.';
                }

                // Check if the file was posted
                if (!empty($_FILES['filename']['name'])) {
                    $file_ext = strtolower(pathinfo($_FILES["filename"]['name'][0], PATHINFO_EXTENSION));
                    $allowed_formats = ['jpg', 'jpeg', 'png'];

                    // Check if the file extension is allowed
                    if (!in_array($file_ext, $allowed_formats)) {
                        $pass = false;
                        $file_type_err = "Only .jpg, .jpeg, .png files are allowed.";
                    } else {
                        $filename = round(microtime(true)).mt_rand() . '.' . $file_ext;
                        $source = $_FILES['filename']['tmp_name'][0];
                        $destination = ROOT . '/public/uploads/' . $filename;
                        if (!move_uploaded_file($source, $destination)) {
                            $pass = false;
                            $upload_err = "File upload error.";
                        }
                    }
                }
                $data = [
                    'firstname' => trim($_POST['firstname']),
                    'lastname' => trim($_POST['lastname']),
                    'filename' => $filename,
                ];

                // If no validation errors are present, upload file and write data
                if ($pass) {

                    // Return a JSON response for form success message
                    if ($this->postModel->addPost($data)) {
                        echo json_encode([
                            "status" => $pass,
                            "message" => 'Posted sucessfully.',
                        ]);
                    } else {
                        echo json_encode([
                            "message" => 'Oops. Something went wrong.',
                        ]);
                    }
                } else {

                    // Return a JSON response for form alert message
                    echo json_encode([
                        "status" => $pass,
                        "message" => 'ERROR: '.
                                    $firstname_err.' '.
                                    $file_type_err.' '.
                                    $file_size_err.' '.
                                    $upload_err.' ',
                    ]);                
                }
            }       

        } else {
            $data = [
                'firstname' => '',
                'lastname' => '',
                'filename' => '',
            ];
            $this->view('posts/add', $data);
        }
    }
}
