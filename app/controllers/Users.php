<?php 

class Users extends Controller{

    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize post data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            // Init data
            $data = [
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'confirm_password' => trim($_POST['confirm_password']),
            'name_err' => '',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => ''
            ];
            // Validate email
            if(empty($data['name'])){
                $data['name_err'] = 'Please enter name';
            }

            // Validate Email
            if(empty($data['email'])){
                $data['email_err'] = 'Pleae enter email';
            } else {
            // Check email
            if($this->userModel->findUserByEmail($data['email'])){
              $data['email_err'] = 'Email is already taken';
            }
          }

            // validate password
            if(empty($data['password'])){
                $data['password_err'] = "Please enter password";
            } elseif(strlen($data['password']) < 6){
                $data['password_err'] = "Password must be more than 6 characters";
            }

            // validate confirm password
            if(empty($data['confirm_password'])){
            $data['confirm_password_err'] = 'Pleae confirm password';
            } else {
            if($data['password'] != $data['confirm_password']){
              $data['confirm_password_err'] = 'Passwords do not match';
            }
          }

        //   make sure errors are empty
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                // hash password
                $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
                // Register User
                if($this->userModel->register($data)){
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('admin/dashboard/register', $data);
            }
        } else {

            $data =[
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            $this->view('admin/dashboard/register', $data);
        }
    }


    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            // init data

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '', 
            ];
            // Validate Email
            if(empty($data['email'])){
                $data['email_err'] = 'Pleae enter email';
            }
            // Validate Password
            if(empty($data['password'])){
            $data['password_err'] = 'Please enter password';
            }

            // to check user email
            if($this->userModel->findUserByEmail($data['email'])){
                // user found
            } else {
                $data['email_err'] ='No users found';
            }
            if(empty($data['email_err']) &&  empty($data['password_err']) ){
                $loggedInUser = $this->userModel->login($data['email'],$data['password']);

                if($loggedInUser){
                    $this->createUserSession($loggedInUser);
                } else {
                    $this->view('admin/dashboard/login');
                }

            } else {
                // load with errors
                $this->view('admin/dashboard/login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',  
            ];

             // Load view
        $this->view('admin/dashboard/login', $data);
        }
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;
        redirect('/icos/home');
    }
}