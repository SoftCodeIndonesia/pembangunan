<?php


    class M_rules
    {
        protected $db;
        public function __construct()
        {
            $this->db = new Database;
        }

        public function allRules()
        {
            $query = "SELECT * FROM rules";

            $this->db->query($query);
            return $this->db->resultSet();
        }
    }
    