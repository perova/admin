<?php

use uFrame\Controller;

class Auth extends Controller
{


    public $messages = [];

    public function index()
    {

        $this->loginForm();

    }


    public function loginForm()
    {

        $data = $this->messages;
        $data[] = "Please login";
        $this->view("auth/login", $data);

    }

    public function regForm()
    {


        $data = $this->messages;

        $data[] = 'Please register to use our system';

        $this->view("auth/register", $data);
    }

    public function login()
    {

        if (isset($_POST['username']) && $_POST['username'] != null) {
            $user = $this->model('UserModel');
            $userdata = $user->getUserByUsername($_POST['username']);
            if (!isset($userdata[0]['username']) && !isset($userdata[0]['password'])) {
                $this->messages[] = 'Wrong username or password';
                $this->loginForm();
                die();
            }
            if (password_verify($_POST['password'], $userdata[0]['password'])) {
                $_SESSION['username'] = $userdata[0]['username'];
                $_SESSION['level'] = $userdata[0]['level'];
                $_SESSION['last_login'] = date("Y-n-d H:m:s");
                setcookie("sausainis_username", $userdata[0]['username'], time() + (86400 * 7), "/"); // 86400 = 1 day

                if ($_SESSION['level'] >= 2) {


                    header("Location: /" . CONFIG['site_path'] . '/admin');
                } else {
                    header("Location: /" . CONFIG['site_path']);
                }

            } else {
                $this->messages[] = 'Wrong username or password';
                $this->loginForm();


            }

        }
    }

    public function register()
    {


        if (isset($_POST['register_username']) && $_POST['register_username'] != null && isset($_POST['register_password']) && $_POST['register_password'] != '') {
            if ($_POST['register_password'] == $_POST['repeat_password']) {
                try {
                    $user = $this->model('UserModel');
                    $user->addUser($_POST['register_username'], $_POST['register_password']);
                    $this->messages[] = 'Registered , please login';
                    $this->loginForm();

                } catch (PDOException $e) {

                    $this->messages[] = 'This username already exist';
                    $this->regForm();
                    // "Connection failed: " . $e->getMessage();
                }

            } else {
                $this->messages[] = 'Passwords does not match';
                $this->regForm();
            }
        }


    }

    public function logout()
    {
        session_destroy();
        $_SESSION['username'] = null;
        $_SESSION['level'] = null;
        $this->loginForm();
    }


}