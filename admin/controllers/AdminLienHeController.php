<?php

class AdminLienHeController {
    public $modelLienHe;
    public function __construct(){
        $this->modelLienHe = new AdminLienHe();
    }

    public function index() {
        $lienHes=$this->modelLienHe->getAllLienHe();
        require_once "./views/lienhe/list_lien_he.php";

    }
    public function edit(){
        $id=$_GET["id_lien_he"];
        $lienHe=$this->modelLienHe->getDetailData($id);
        require_once "./views/lienhe/edit_lien_he.php";
    }
    public function update() {
        $id = $_POST["id_lien_he"];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $trang_thai = $_POST["trang_thai"];
            $errors = [];
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }
            if (empty($errors)) {
                $this->modelLienHe->updateData($id, $trang_thai);
                unset($_SESSION['errors']);
                header('Location: ?act=lien-he');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=update-lien-he'); 
                exit();
            }
        }
    }
    public function delete() {
        $id = $_GET['id_lien_he'];
        $this->modelLienHe->deleteLienHe($id);
        header('Location: ?act=lien-he');
        exit();
    }
    
}