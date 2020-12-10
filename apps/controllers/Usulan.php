<?php

    class Usulan extends Controller
    {
        public function __construct()
        {

        }   
        
        
        public function index()
        {
            $data['title'] = 'Usuan masyarakat';
            $this->view('usulan/index',$data);
        }
    }
    