<?php

    class Login extends Controller
    {
        protected $helper;
        public function __construct()
        {
            $this->helper = new Helper();
        }  
        
        
        public function index()
        {
            $data['title'] = 'Login';
            $this->view('login/index',$data);
        }

        public function login()
        {
            $data['user_id'] = $_POST['user_id'];
            $data['password'] = $_POST['password'];

            $user = $this->model('M_user')->getById($data['user_id']);
            if($user)
            {
                if($user['password'] == md5($data['password'])){
                    $_SESSION['set_value'] = $data;
                    $_SESSION['userdata'] = $user;
                    $this->helper->session_destroy(['set_value','form_error']);
                    $this->redirect(BASE_URL);
                }else{
                    $_SESSION['set_value'] = $data;
                    $_SESSION['form_error'] = [
                        'password' => 'password USER salah!'
                    ];
                    $this->redirect(BASE_URL . 'Login');    
                }
            }else{
                $_SESSION['set_value'] = $data;
                $_SESSION['form_error'] = [
                    'user_id' => 'ID USER salah!'
                ];
                $this->redirect(BASE_URL . 'Login');
            }
        }

        public function logout()
        {
            unset($_SESSION);
            session_destroy();

            $this->redirect(BASE_URL);
        }
    }
    