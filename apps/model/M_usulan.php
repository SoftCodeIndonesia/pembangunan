<?php

    class M_usulan
    {
        protected $db;
        public function __construct()
        {
            $this->db = new Database;
        }

        public function insert($data)
        {
            $query = "INSERT INTO usulan VALUES (null,:title,:created_at,:created_by,:is_read)";
            $this->db->query($query);
            $this->db->bind('title',$data['title']);
            $this->db->bind('created_at',$data['created_at']);
            $this->db->bind('created_by',$data['created_by']);
            $this->db->bind('is_read',$data['is_read']);

            return $this->db->num_rows();
        }

        public function getAllUsulan()
        {
            $query = "SELECT *,rul.name as rule,u.name as name,us.created_by as writer FROM usulan us LEFT JOIN users u ON u.user_id = us.created_by LEFT JOIN rules rul ON rul.rules_id = u.rules_id";

            if(!empty($_SESSION['userdata']))
            {
                 $query = $query . ' WHERE us.created_by = :created_by';
            }

            $this->db->query($query);
            
            if(!empty($_SESSION['userdata']))
            {
                $this->db->bind('created_by',$_SESSION['userdata']['user_id']);
            }

            return $this->db->resultSet();
        }
    }
    