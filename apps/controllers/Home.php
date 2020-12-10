<?php

    class Home extends Controller {
        

        public function index()
        {
            $data['title'] = 'Usulan pembangunan';
            $this->view("home/index",$data);
        }
    }