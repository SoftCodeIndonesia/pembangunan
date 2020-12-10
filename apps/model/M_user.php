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
            $query = 'SELECT *,r.name as rule, us.name as created_by FROM users u LEFT JOIN rules r ON u.rules_id = r.rules_id LEFT JOIN users us ON us.user_id = u.create_by ORDER BY u.user_id ASC';

            $this->db->query($query);
            return $this->db->resultSet();
        }
    }
    