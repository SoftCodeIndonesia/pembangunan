<?php


class Report extends Controller
{
    protected $model;
    protected $helper;
    public function __construct()
    {
        $this->helper = new Helper;
        $this->model = $this->model('M_report');
    }

    public function index()
    {
        $data['title'] = 'Laporan';

        $data['js'] = [
            'file/index.js'
        ];
        $this->view('files/index', $data);
    }

    public function tambah()
    {
        $data['title'] = "Tambah file";
        $data['js'] = [
            'file/upload.js'
        ];
        $this->view('files/tambah', $data);
    }

    public function getAllAttachment()
    {
        $attachment = $this->model->getAttactment();

        echo json_encode($attachment);
    }

    public function storeCreated()
    {
        $data['title'] = htmlspecialchars(($_POST['title']));
        $data['_description'] = $_POST['description'];
        $data['created_by'] = $_SESSION['userdata']['user_id'];
        $data['created_at'] = time();

        $source = 'assets/attachment/';

        $attachment_id = $this->model->insertAttachment($data);

        if ($_FILES) {
            foreach ($_FILES as $file) {
                $extension = end(explode('.', $file['name']));
                $fileName = time() . '.' . $extension;

                move_uploaded_file($file['tmp_name'], $source . $fileName);

                $files['attachment_id'] = $attachment_id;
                $files['name'] = $fileName;
                $files['source'] = $source . $fileName;


                $this->model->insert_file($files);
            }
        }

        $_SESSION['flash'] = 'berhasil ditambahkan!';
        $this->helper->session_destroy(['form_error', 'set_value']);
        $this->redirect(BASE_URL . 'Report');
    }

    public function delete($idAttachment)
    {
        if ($this->model->delete($idAttachment)) {
            $_SESSION['flash'] = 'berhasil dihapus!!';
            $this->redirect(BASE_URL . 'Report');
        }
    }

    public function destroy_session()
    {
        $this->helper->session_destroy(['flash']);
    }

    public function ubah($id)
    {


        $data['title'] = 'Ubah report';
        $data['js'] = [
            'file/edit.js',
            'file/upload.js',
        ];
        $this->view('files/ubah', $data);
    }

    public function getDataWithUpdate($id)
    {
        $attachment = $this->model->getById($id);
        $file = $this->model->getFileByAttachment($id);
        $data = [
            $attachment,
            $file
        ];
        echo json_encode($data);
    }

    public function deleteFile()
    {
        $file_id = $_POST['file_id'];

        echo json_encode($this->model->deleteFileById($file_id));
    }

    public function storeEdit($attachment_id)
    {
        $data['title'] = htmlspecialchars(($_POST['title']));
        $data['_description'] = $_POST['description'];
        $data['created_by'] = $_SESSION['userdata']['user_id'];
        $data['created_at'] = time();

        $source = 'assets/attachment/';

        $attachment_id = $attachment_id;

        if ($this->model->edit($data, $attachment_id) > 0) {
            if ($_FILES) {
                foreach ($_FILES as $file) {
                    $extension = end(explode('.', $file['name']));
                    $fileName = time() . '.' . $extension;

                    move_uploaded_file($file['tmp_name'], $source . $fileName);

                    $files['attachment_id'] = $attachment_id;
                    $files['name'] = $fileName;
                    $files['source'] = $source . $fileName;


                    $this->model->insert_file($files);
                }
            }

            $_SESSION['flash'] = 'berhasil ditambahkan!';
        } else {
            $_SESSION['flash'] = 'berhasil ditambahkan!';
        }


        $this->helper->session_destroy(['form_error', 'set_value']);
        $this->redirect(BASE_URL . 'Report');
    }


    public function detail($attachment_id)
    {
        $data['title'] = 'Detail Laporan';
        $data['attachment'] = $this->model->getById($attachment_id);
        $data['file'] = $this->model->getFileByAttachment($attachment_id);
        $this->view('files/detail', $data);
    }
}