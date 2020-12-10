<?php

    class User extends Controller
    {
        protected $helper;
        protected $model;
        public function __construct()
        {
            $this->helper = new Helper;
            $this->model = $this->model('M_user');
        }   
        
        public function index()
        {
            $data['title'] = 'Users';
            $data['js'] = [
                'user/index.js'
            ];
            $this->view('user/index',$data);
        }

        public function allUsers()
        {
            $users = $this->model->getAll();
            $table = [];
            $no = 1;

            foreach ($users as $value) {
                $data = [];

                $ubah = '<a href="'.BASE_URL.'Users/ubah/'.$value['user_id'].'" class="btn btn-sm btn-light btn-block">ubah</a>';
                $hapus = '<a href="'.BASE_URL.'Users/hapus/'.$value['user_id'].'" class="btn btn-sm btn-light btn-block">hapus</a>';
                
                $data[] = "<th>". $no++ ."</th>";
                $data[] = "<th>".$value['name']."</th>";
                $data[] = "<th>".$value['rule']."</th>";
                $data[] = "<th>".$value['created_by']."</th>";
                $data[] = "<th>". date('d M Y', $value['created_at'])."</th>";
                $data[] = "<th>". $ubah . $hapus ."</th>";
                
                $table[] = $data;
            }

            $output = array(
                "recordsTotal" => count($users),
                "recordsFiltered" => count($users),
                "data" => $table,
            );
            echo json_encode($output);
            exit();
        }

        public function tambah()
        {
            $data['title'] = 'Tambah data';
            $data['rules'] = $this->model('M_rules')->allRules();
            $this->view('user/tambah',$data);
        }

        // public function storeCreated()
        // {
        //     $
        // }
    }
    