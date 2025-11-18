<?php
class SiswaController extends Controller {
    private $id_user;
    private $siswa;

    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION['id_user']) || ($_SESSION['role'] ?? '') !== 'siswa') {
            header('Location: ?url=authcontroller/login');
            exit;
        }
        $this->id_user = $_SESSION['id_user'];
        $siswaModel = $this->model('Siswa');
        $this->siswa = $siswaModel->getByUser($this->id_user);
        if (!$this->siswa) {
            $error = 'Data siswa tidak ditemukan.';
            $this->view('auth/login', compact('error'));
            exit;
        }
    }

    public function index() {
        $this->dashboard();
    }

    public function dashboard() {
        $leaveModel = $this->model('Leave');
        $leaves = $leaveModel->getBySiswa($this->siswa['id_siswa']);
        $this->view('siswa/dashboard', ['siswa' => $this->siswa, 'leaves' => $leaves]);
        $kelasModel = $this->model('Kelas');
        $kelas = $kelasModel->getById($this->siswa['id_kelas']);

    }

    public function leave_add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $date = $_POST['tanggal'] ?? '';
            $reason = trim($_POST['alasan'] ?? '');

            $leaveModel = $this->model('Leave');
            $leaveModel->add($this->siswa['id_siswa'], $date, $reason);

            header('Location: ?url=siswacontroller/dashboard');
            exit;
        }
        $this->view('siswa/leave_add', ['siswa' => $this->siswa]);

    }
}