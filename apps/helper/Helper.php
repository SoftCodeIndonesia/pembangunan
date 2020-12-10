<?php

    class Helper
    {
        public function redrect($url)
        {
            header('location: ' . $url);
        }

        public function form_error($field)
        {
            if(!empty($_SESSION['form_error'][$field]))
            {
                echo $_SESSION['form_error'][$field];
            }
        }

        public function set_value($field)
        {
            if(!empty($_SESSION['set_value'][$field]))
            {
                echo $_SESSION['set_value'][$field];
            }

            
        }

        public function session_destory($session = [])
        {
            foreach ($session as $value) {
                unset($_SESSION[$value]);
            }
        }

        public function createId($lastId)
        {
            $userId = 'ID';
            $id = substr($lastId,2);

            $id = (int)$id;

            $uniqIdNumber = $id + 1;
            if(strlen($uniqIdNumber) == 1){
                $userId = $userId . '00' . $uniqIdNumber;
            }else if(strlen($uniqIdNumber) == 2){
                $userId = $userId . '0' . $uniqIdNumber;
            }else{
                $userId = $userId . $uniqIdNumber;
            }
            return $userId;
        }
    }