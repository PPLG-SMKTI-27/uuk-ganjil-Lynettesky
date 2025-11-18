<?php
class WaliController extends Controller {
    private $id_user;
    private $wali;

    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION['id_user']) || ($_SESSION['role'] ?? '') !== 'wali') {
            header('Location: ?url=authcontroller/login');
            exit;
        }
        $this->id_user = $_SESSION['id_user'];
        $waliModel = $this->model('Wali');
        $this->wali = $waliModel->getByUser($this->id_user);
        if (!$this->wali) {
            $error = 'Data wali kelas tidak ditemukan.';
            $this->view('auth/login', compact('error'));
            exit;
        }
    }

    public function index() {
        $this->dashboard();
    }

    public function dashboard() {
        $leaveModel = $this->model('Leave');
        $pending = $leaveModel->getPendingByKelas($this->wali['kelas']);
        $this->view('wali/dashboard', ['wali' => $this->wali, 'leaves' => $pending]);
    }

    public function leave_review($id_leave) {
        $leaveModel = $this->model('Leave');
        $leave = $leaveModel->getById($id_leave);
        if (!$leave) {
            $msg = 'Data izin tidak ditemukan.';
            $this->view('wali/dashboard', ['wali' => $this->wali, 'leaves' => [], 'msg' => $msg]);
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'] ?? '';
            if ($action === 'approve') {
                $leaveModel->approve($id_leave, $this->wali['id_wali']);
            } elseif ($action === 'reject') {
                $leaveModel->reject($id_leave, $this->wali['id_wali']);
            }
            header('Location: ?url=walicontroller/dashboard');
            exit;
        }

        $this->view('wali/leave_review', ['leave' => $leave, 'wali' => $this->wali]);
    }
}