<?
require_once(APPROOT."/librairies/controller.php");

class Users extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->loadModel("User");
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                "email" => trim($_POST['email']),
                "password" => trim($_POST['password']),
            ];

            $user = $this->userModel->login($data['email'], $data['password']);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                echo '<p>'.$user.'</p>';
                exit;
            } else {
                $errorMessage = 'Adresse email ou mot de passe invalide.';
            }
        }else{
            $data = [
                "email" => "",
                "password" => "",
            ];
            $this->render("login", $data);
        }

        // Afficher le formulaire de connexion
        require_once('views/users/login.php');
    }


    public function logout()
    {
        session_destroy();
        header('Location: login.php');
        exit;
    }
}
?>