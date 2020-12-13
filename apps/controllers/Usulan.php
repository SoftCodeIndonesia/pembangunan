<?php

    class Usulan extends Controller
    {
        protected $model;
        protected $helper;
        public function __construct()
        {
            $this->model = $this->model('M_usulan');
            $this->helper = new Helper;
        }   
        
        
        public function index()
        {
            $data['title'] = 'Usuan masyarakat';
            $data['js'] = [
                'usulan/index.js'
            ];
            $data['usulan'] = $this->model->getAllUsulan();
            $this->view('usulan/index',$data);
        }

        public function tambah()
        {
            $data['title'] = 'Buat Usulan';
            
            $this->view('usulan/tambah',$data);
        }

        public function storeCreated()
        {
            $data['title'] =  $_POST['title'];
            $data['created_at'] = time();
            $data['created_by'] = $_SESSION['userdata']['user_id'];
            $data['is_read'] = 0;

            if($this->model->insert($data) > 0)
            {
                $_SESSION['flash'] = 'berhasil ditambahkan!';
                $this->redirect(BASE_URL . 'Usulan');
            }else{
                $_SESSION['flash'] = 'gagal ditambahkan!';
                $this->redirect(BASE_URL . 'Usulan');
            }
        }

        public function getAllUsulan()
        {
            $usulan = $this->model->getAllUsulan();
            echo json_encode($usulan);
        }
    }
    