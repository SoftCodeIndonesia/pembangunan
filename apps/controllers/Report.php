<?php


    class Report extends Controller
    {
        public function __construct()
        {

        }

        public function index()
        {
            $data['title'] = 'Laporan';
            $this->view('files/index',$data);
        }     
    }
    