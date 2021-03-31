<?php


class Report extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data['title'] = 'Laporan';
        $this->view('files/index', $data);
    }

    public function tambah()
    {
        $data['title'] = "Tambah file";
        $data['js'] = [
            'file/upload.js'
        ];
        $this->view('files/tambah', $data);
    }

    public function storeCreated()
    {
        var_dump($_POST);
        var_dump($_FILES);
    }
}