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
        $query = "INSERT INTO usulan VALUES (null,:title,:lat,:lang,:created_at,:created_by,:is_read)";
        $this->db->query($query);
        $this->db->bind('title', $data['title']);
        $this->db->bind('lat', $data['lat']);
        $this->db->bind('lang', $data['lng']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('created_by', $data['created_by']);
        $this->db->bind('is_read', $data['is_read']);

        return $this->db->num_rows();
    }

    public function getAllUsulan()
    {
        $query = "SELECT *,rul.name as rule,u.name as name,us.created_by as writer FROM usulan us LEFT JOIN users u ON u.user_id = us.created_by LEFT JOIN rules rul ON rul.rules_id = u.rules_id";

        if (!empty($_SESSION['userdata'])) {
            $query = $query . ' WHERE us.created_by = :created_by';
        }

        $this->db->query($query);

        if (!empty($_SESSION['userdata'])) {
            $this->db->bind('created_by', $_SESSION['userdata']['user_id']);
        }

        return $this->db->resultSet();
    }


    public function getById($idUsulan)
    {
        $query = "SELECT *,rul.name as rule,u.name as name,us.created_by as writer FROM usulan us LEFT JOIN users u ON u.user_id = us.created_by LEFT JOIN rules rul ON rul.rules_id = u.rules_id WHERE us.usulan_id = :id_usulan";


        $this->db->query($query);
        $this->db->bind('id_usulan', $idUsulan);

        return $this->db->single();
    }

    public function ubah($data, $idUsulan)
    {
        $query = "UPDATE usulan SET title = :title, lat = :lat, lang = :lang,created_at = :created_at, created_by = :created_by, is_read = :is_read WHERE usulan_id = :usulan_id";

        $this->db->query($query);

        $this->db->bind('title', $data['title']);
        $this->db->bind('lat', $data['lat']);
        $this->db->bind('lang', $data['lng']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('created_by', $data['created_by']);
        $this->db->bind('is_read', $data['is_read']);
        $this->db->bind('usulan_id', $idUsulan);

        return $this->db->num_rows();
    }

    public function delete($idUsulan)
    {
        $query = "DELETE FROM usulan WHERE usulan_id = :usulan_id";

        $this->db->query($query);

        $this->db->bind("usulan_id", $idUsulan);

        return $this->db->num_rows();
    }
}