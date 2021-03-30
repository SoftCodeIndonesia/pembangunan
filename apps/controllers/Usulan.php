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
        $this->view('usulan/index', $data);
    }

    public function getAllData()
    {
        echo json_encode($this->model->getAllUsulan());
    }

    public function tambah()
    {
        $data['title'] = 'Buat Usulan';
        $data['js'] = [
            'usulan/tambah.js'
        ];
        $this->view('usulan/tambah', $data);
    }

    public function storeCreated()
    {
        $data['title'] =  $_POST['title'];
        $data['created_at'] = time();
        $data['created_by'] = $_SESSION['userdata']['user_id'];
        $data['is_read'] = 0;

        if ($this->model->insert($data) > 0) {
            $_SESSION['flash'] = 'berhasil ditambahkan!';
            $this->redirect(BASE_URL . 'Usulan');
        } else {
            $_SESSION['flash'] = 'gagal ditambahkan!';
            $this->redirect(BASE_URL . 'Usulan');
        }
    }

    public function getAllUsulan()
    {
        $usulan = $this->model->getAllUsulan();
        echo json_encode($usulan);
    }

    public function ubah($idUsulan)
    {
        $data['title'] = "ubah usulan";
        $data['usulan'] = $this->model->getById($idUsulan);
        $this->view('usulan/ubah', $data);
    }

    public function storeUbah()
    {
        $data['title'] =  $_POST['title'];
        $data['created_at'] = time();
        $data['created_by'] = $_SESSION['userdata']['user_id'];
        $data['is_read'] = $_POST['is_read'];
        $idUsulan = $_POST['usulan_id'];
        if ($this->model->ubah($data, $idUsulan) > 0) {
            $_SESSION['flash'] = 'berhasil diubah!';
            $this->redirect(BASE_URL . 'Usulan');
        } else {
            $_SESSION['flash'] = 'gagal diubah!';
            $this->redirect(BASE_URL . 'Usulan');
        }
    }

    public function detail($idUsulan)
    {
        $data['title'] = "detail usulan";
        $data['usulan'] = $this->model->getById($idUsulan);
        $this->view('usulan/detail', $data);
    }

    public function delete()
    {
        $idUsulan = $_POST['usulan_id'];

        echo json_encode($this->model->delete($idUsulan));
    }
}