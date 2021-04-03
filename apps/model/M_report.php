<?php

class M_report
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function insertAttachment($data)
    {


        $query = "INSERT INTO Attachment VALUES (null, :title, :description, :created_at, :created_by)";

        $this->db->query($query);

        $this->db->bind('title', $data['title']);
        $this->db->bind('description', $data['_description']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('created_by', $data['created_by']);

        return $this->db->insert_id();
    }

    public function insert_file($data)
    {
        $query = "INSERT INTO file VALUE (null,:attachment_id, :name, :source)";

        $this->db->query($query);

        $this->db->bind('attachment_id', $data['attachment_id']);
        $this->db->bind('name', $data['name']);
        $this->db->bind('source', $data['source']);

        return $this->db->num_rows();
    }

    public function getAttactment()
    {
        $query = "SELECT *,a.attachment_id as attachment_id FROM Attachment a LEFT JOIN file f ON f.attachment_id = a.attachment_id GROUP BY a.attachment_id";

        $this->db->query($query);

        return $this->db->resultSet();
    }

    public function delete($attachment_id)
    {
        $this->deleteFile($attachment_id);
        $this->destroyFile($attachment_id);
        $query = "DELETE FROM Attachment WHERE Attachment.attachment_id = :attachment_id";

        $this->db->query($query);

        $this->db->bind('attachment_id', $attachment_id);

        return $this->db->num_rows();
    }

    public function destroyFile($attachment_id)
    {
        $data = $this->getFileByAttachment($attachment_id);

        foreach ($data as $key => $value) {
            if (file_exists(BASE_URL . $value['source'])) {
                unlink(BASE_URL . $value['source']);
            }
        }
    }

    public function deleteFile($attachment_id)
    {
        $query = "DELETE FROM file WHERE file.attachment_id = :attachment_id";

        $this->db->query($query);

        $this->db->bind('attachment_id', $attachment_id);


        return $this->db->num_rows();
    }

    public function getById($id)
    {
        $query = 'SELECT * FROM Attachment WHERE Attachment.attachment_id = :attachment_id';

        $this->db->query($query);

        $this->db->bind('attachment_id', $id);

        return $this->db->single();
    }

    public function getFileByAttachment($attachment_id)
    {
        $query = "SELECT * FROM file WHERE file.attachment_id = :attachment_id";

        $this->db->query($query);

        $this->db->bind('attachment_id', $attachment_id);

        return $this->db->resultSet();
    }
}