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

        public function getRulesById($rule_id)
        {
            $query = "SELECT * FROM rules WHERE rules_id = :rules_id";

            $this->db->query($query);

            $this->db->bind('rules_id',$rule_id);

            return $this->db->single();
        }
    }
    