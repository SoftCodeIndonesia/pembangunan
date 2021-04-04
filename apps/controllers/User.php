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
        $this->helper->session_destroy(['form_error', 'set_value']);
        $data['title'] = 'Users';
        $data['user'] = $this->model->getAll();
        $data['js'] = [
            'user/index.js'
        ];
        $this->view('user/index', $data);
    }

    public function allUsers()
    {
        $users = $this->model->getAll();
        $table = [];
        $no = 1;

        foreach ($users as $value) {
            $data = [];

            $ubah = '<a href="' . BASE_URL . 'User/ubah/' . $value['user_id'] . '" class="btn btn-sm btn-light btn-block">ubah</a>';
            $hapus = '<a href="' . BASE_URL . 'User/hapus/' . $value['user_id'] . '" data-id="' . $value['user_id'] . '" class="btn-delete btn btn-sm btn-light btn-block">hapus</a>';
            $login = '<a href="' . BASE_URL . 'Login" class="btn btn-sm btn-light btn-block">Login</a>';
            $data[] = '<tr>';
            $data[] = "<th>" . $no++ . "</th>";
            $data[] = "<th>" . $value['name'] . "</th>";
            $data[] = "<th>" . $value['rule'] . "</th>";
            $data[] = "<th>" . $value['created_by'] . "</th>";
            $data[] = "<th>" . date('d M Y', $value['created_at']) . "</th>";
            if (!empty($_SESSION['userdata'])) {
                $data[] = "<th>" . $ubah . $hapus . "</th>";
            } else {
                $data[] = "<th>" . $login . "</th>";
            }
            $data[] = "</tr>";
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
        $this->view('user/tambah', $data);
    }

    public function ubah($id)
    {
        $data['title'] = 'Ubah data';
        $data['user'] = $this->model->getByid($id);
        $data['rules'] = $this->model('M_rules')->allRules();
        $this->view('user/ubah', $data);
    }

    public function storeCreated()
    {
        $users = $this->helper->createId($this->model->getLastUser()['user_id']);

        $data['user_id'] = $users;
        $data['rules_id'] = $_POST['rules_id'];
        $data['name'] = $_POST['name'];
        $data['password'] = md5('123');
        $data['created_at'] = time();
        $data['create_by'] = $_SESSION['userdata']['user_id'];

        $rules = $this->model->userByRulesId($data['rules_id']);
        if ($rules) {
            $_SESSION['form_error'] = [
                'rules' => 'Data sudah ada!'
            ];
            $_SESSION['set_value'] = $data;
            $this->redirect(BASE_URL . 'user/tambah');
        } else {
            if ($this->model->insert($data) > 0) {
                $_SESSION['flash'] = 'berhasil ditambahkan!';
                $this->helper->session_destroy(['form_error', 'set_value']);
                $this->redirect(BASE_URL . 'User');
            } else {
                $_SESSION['flash'] = 'gagal ditambahkan!';
                $this->helper->session_destroy(['form_error', 'set_value']);
                $this->redirect(BASE_URL . 'User');
            }
        }
    }

    public function delete()
    {
        $user_id = $_POST['user_id'];
        echo json_encode($this->model->delete($user_id));
    }

    public function destroy_session()
    {
        $this->helper->session_destroy(['flash']);
    }

    public function storeUbah()
    {
        $user_id = $_POST['user_id'];
        $data['rules_id'] = $_POST['rules_id'];
        $data['name'] = $_POST['name'];
        $data['password'] = md5('123');
        $data['created_at'] = time();
        $data['create_by'] = $_SESSION['userdata']['user_id'];

        $rules = $this->model->userByRulesId($data['rules_id']);
        if ($rules) {
            if ($rules['user_id'] != $user_id) {
                $_SESSION['form_error'] = [
                    'rules' => 'Data sudah ada!'
                ];
                $_SESSION['set_value'] = $data;
                $this->redirect(BASE_URL . 'user/tambah');
            } else {
                if ($this->model->update($user_id, $data) > 0) {
                    $_SESSION['flash'] = 'berhasil diubah!';
                    $this->helper->session_destroy(['form_error', 'set_value']);
                    $this->redirect(BASE_URL . 'User');
                } else {
                    $_SESSION['flash'] = 'gagal diubah!';
                    $this->helper->session_destroy(['form_error', 'set_value']);
                    $this->redirect(BASE_URL . 'User');
                }
            }
        } else {
            if ($this->model->update($user_id, $data) > 0) {
                $_SESSION['flash'] = 'berhasil diubah!';
                $this->helper->session_destroy(['form_error', 'set_value']);
                $this->redirect(BASE_URL . 'User');
            } else {
                $_SESSION['flash'] = 'gagal diubah!';
                $this->helper->session_destroy(['form_error', 'set_value']);
                $this->redirect(BASE_URL . 'User');
            }
        }
    }
}