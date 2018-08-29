<?php
  class Pages extends Controller{
    public function __construct(){
     
    }

    public function index(){

      if(isset($_SESSION['user_id'])){
        redirect('profile');
      }

      $data = [
        'title' => 'Welcome To YourClique',
        'description' => 'Events, art, tourism'
      ];

      $this->view('pages/index', $data);
    }

    public function about(){

      $data = [
        'version' => '1.0.0'
      ];

      $this->view('pages/aboutus', $data);
    }
  }