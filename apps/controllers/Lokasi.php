<?php

class Lokasi extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->model("M_usulan");
    }

    public function index()
    {
        echo 'index';
    }

    public function location($lat, $lng, $idUsulan)
    {

        $data['title'] = "view location";
        $data['usulan'] = $this->model->getById($idUsulan);

        $_SESSION['lat'] = $lat;
        $_SESSION['lng'] = $lng;

        $this->view('location/index', $data);
    }
}