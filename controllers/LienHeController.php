<?php
class LienHeController
{
    public $modelLienHe;
    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelLienHe = new LienHe();
        $this->modelDanhMuc = new DanhMuc();
    }

    public function index()
    {
        // Render contact form view
        $listDanhMuc = $this->modelDanhMuc->danhSachDanhMuc();
        require_once './views/form-lien-he.php';
    }

    public function create()
    {
        // Show form to add new contact message
        require_once './views/lien-he/form-lien-he.php';
    }

    public function store()
    {
        // Process form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_POST['ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $loi_nhan = $_POST['loi_nhan'] ?? '';

            // Validate input
            $errors = [];
            if (empty($ten)) {
                $errors[] = "Tên không được để trống";
            }
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email không hợp lệ";
            }
            if (empty($loi_nhan)) {
                $errors[] = "Lời nhắn không được để trống";
            }

            if (empty($errors)) {
                // If no errors, attempt to store in database
                $result = $this->modelLienHe->insert($ten, $email, $loi_nhan);

                if ($result) {
                    // Redirect with success message
                    header('Location: ?act=lien-he&success=1');
                    exit();
                } else {
                    // Handle database insertion error
                    $errors[] = "Không thể gửi liên hệ. Vui lòng thử lại.";
                }
            }

            // If there are errors, pass them back to the view
            require_once './views/lien-he/form-lien-he.php';
        }
    }
}
