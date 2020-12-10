<?php
    class Controller 
    {


        public function view($view, $data = [])
        {
            $folder = explode('/',$view);
            if($folder[0] == 'login'){
                require_once '../apps/views/' . $view . '.php';
            }else{
                require_once '../apps/views/templates/header.php';
                require_once '../apps/views/' . $view . '.php';
                require_once '../apps/views/templates/footer.php';
            }
        }


        public function model($model)
        {
            require_once '../apps/model/' . $model . '.php';
            return new $model;
        }

        public function redirect($url)
        {
            header('location: ' . $url);
        }
    }
    