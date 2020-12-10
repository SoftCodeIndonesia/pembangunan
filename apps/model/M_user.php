<?php

    class M_user
    {
        private $db;
        public function __construct()
        {
            $this->db = new Database;
        }
        
        public function getAll()
        {
            $query = 'SELECT *,r.name as rule, us.name as created_by,u.name as name,u.user_id as user_id,u.created_at as created_at FROM users u LEFT JOIN rules r ON u.rules_id = r.rules_id LEFT JOIN users us ON us.user_id = u.create_by ORDER BY u.user_id ASC';

            $this->db->query($query);
            return $this->db->resultSet();
        }

        public function getLastUser()
        {
            $query = 'SELECT * FROM users ORDER BY created_at DESC LIMIT 1';

            $this->db->query($query);

            return $this->db->single();
        }


        public function insert($data)
        {
            $query = 'INSERT INTO users VALUES (:user_id,:rules_id,:name,:password,:created_at,:create_by)';

            $this->db->query($query);

            $this->db->bind('user_id',$data['user_id']);
            $this->db->bind('rules_id',$data['rules_id']);
            $this->db->bind('name',$data['name']);
            $this->db->bind('password',$data['password']);
            $this->db->bind('created_at',$data['created_at']);
            $this->db->bind('create_by',$data['create_by']);

            return $this->db->num_rows();
        }

        public function userByRulesId($rules_id)
        {
            $query = "SELECT * FROM users WHERE rules_id = :rules_id";

            $this->db->query($query);
            $this->db->bind('rules_id',$rules_id);
            return $this->db->single();
        }

        public function delete($user_id)
        {
            $query = "DELETE FROM users WHERE user_id = :user_id";

            $this->db->query($query);
            $this->db->bind('user_id',$user_id);
            return $this->db->num_rows();
        }

        public function getById($user_id)
        {
            $query = "SELECT *,r.name as rule, us.name as created_by,u.name as name,u.user_id as user_id,u.created_at as created_at,u.create_by as created_by, u.create_by as create_by,u.password as password, r.rules_id as rules_id FROM users u LEFT JOIN rules r ON u.rules_id = r.rules_id LEFT JOIN users us ON us.user_id = u.create_by WHERE u.user_id = :user_id";
            $this->db->query($query);
            $this->db->bind('user_id',$user_id);
            return $this->db->single();
        }

        public function update($user_id,$data)
        {
            $query = "UPDATE users SET rules_id = :rules_id,name = :name, password = :password, created_at = :created_at, create_by = :create_by WHERE user_id = :user_id";

            $this->db->query($query);
            $this->db->bind('rules_id',$data['rules_id']);
            $this->db->bind('name',$data['name']);
            $this->db->bind('password',$data['password']);
            $this->db->bind('created_at',$data['created_at']);
            $this->db->bind('create_by',$data['create_by']);
            $this->db->bind('user_id',$user_id);

            return $this->db->num_rows();
        }
    }
    