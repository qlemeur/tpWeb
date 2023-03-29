<?php
require_once(APPROOT."/app/libraries/controller.php");

class Users extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->loadModel("User");
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                "email" => trim($_POST['email']),
                "password" => trim($_POST['password']),
                "confirm_password" => "",
                "email_error" => "",
                "password_error" => "",
                "confirm_password_error" => "",
                "name_error" =>"",
            ];
            if (empty($data['email'])){
                $data['email_error'] = "Email is required";
            }
            if (empty($data['password'])) {
                $data['password_error'] = "Password is required";
            }
            if (empty($data['confirm_password'])) {
                $data['confirm_password_error'] = "Confirm Password is required";
            }
            if ($this->userModel->findUserByEmail($data['email'])) {
                $data['email_error'] = "Email already exists";
            }
            if ((empty($data['email_error']))&&(empty($data['password_error']))&&(empty($data['confirm_password_error']))) {
                $this->render("login", []);
            }else{
                $this->render("register", $data);
            }
        }else{
            $this->render("register", []);
        }
    }


    public function logout()
    {
        session_destroy();
        header('Location: login.php');
        exit;
    }
}
?>