<?php


  class Users extends Controller{

    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function index(){
      redirect('welcome');
    }

    public function register(){

      if($this->isLoggedIn()){
        redirect('profile');
      }

      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
       
        $data = [
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'name_err' => '',
          'email_err' => '',
          'password_err' => ''
        ];

        if(empty($data['email'])){
            $data['email_err'] = 'Please enter an email';

            if(empty($data['name'])){
              $data['name_err'] = 'Please enter a name';
            }
            
        } else{

          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email is already taken.';
          }
        }

        if(empty($data['password'])){
          $password_err = 'Please enter a password.';     
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must have atleast 6 characters.';
        }

        if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err'])){

          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

         if($this->userModel->register($data)){

            
            redirect('users/login');
          } else {
            die('Something went wrong');
          }
           
        } else {

          $this->view('users/register', $data);
        }
      } else {
        $data = [
          'name' => '',
          'email' => '',
          'password' => '',
          'name_err' => '',
          'email_err' => '',
          'password_err' => ''
        ];

        $this->view('users/register', $data);
      }
    }

    public function login(){

      if($this->isLoggedIn()){
        redirect('profile');
      }

      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [       
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),        
          'email_err' => '',
          'password_err' => '',       
        ];

        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email.';
        }

        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password.';
        }

        if($this->userModel->findUserByEmail($data['email'])){

        } else {

          $data['email_err'] = 'This email is not registered.';
        }

        if(empty($data['email_err']) && empty($data['password_err'])){

          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if($loggedInUser){

            $this->createUserSession($loggedInUser);
           
          } else {
            $data['password_err'] = 'Password incorrect.';

            $this->view('users/login', $data);
          }
           
        } else {

          $this->view('users/login', $data);
        }

      } else {

        $data = [
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',
        ];

        $this->view('users/login', $data);
      }
    }

    public function subscribe(){

      if($this->isLoggedIn()){
        redirect('profile');
      }

      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
       
        $data = [
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'name_err' => '',
          'email_err' => ''
        ];

        if(empty($data['email'])){
            $data['email_err'] = 'Please enter an email';

            if(empty($data['name'])){
              $data['name_err'] = 'Please enter a name';
            }
            
        } else{

          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email is already taken.';
          }
        }

        if(empty($data['name_err']) && empty($data['email_err'])){

         if($this->userModel->subscribe($data)){
  
            redirect('users/login');
          } else {
            die('Something went wrong');
          }
           
        } else {

          $this->view('users/subscribe', $data);
        }
      } else {
        $data = [
          'name' => '',
          'email' => '',
          'name_err' => '',
          'email_err' => ''
        ];

        $this->view('users/subscribe', $data);
      }
    }


    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email; 
      $_SESSION['user_password'] = $user->password;
      redirect('profile');
    }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_password']);
      session_destroy();
      redirect('users/home');
    }

    public function isLoggedIn(){
      if(isset($_SESSION['user_id'])){
        return true;
      } else {
        return false;
      }
    }

}

