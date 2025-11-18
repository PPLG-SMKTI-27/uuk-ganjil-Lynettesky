<?php
class AuthController extends Controller {
    public function index() {
        $this->view('auth/login');
    }

    public function login() {
        $this->view('auth/login');
    }

    public function process_login() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?url=authcontroller/login');
            exit;
        }

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        $userModel = $this->model('User');
        $user = $userModel->findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'siswa') {
                header('Location: ?url=siswacontroller/dashboard');
            } elseif ($user['role'] === 'wali') {
                header('Location: ?url=walicontroller/dashboard');
            } else {
                header('Location: ?url=landingcontroller/index');
            }
            exit;
        }

        $error = 'Login gagal! Username atau password salah.';
        $this->view('auth/login', compact('error'));
    }

    public function logout() {
        session_destroy();
        header('Location: ?url=landingcontroller/index');
        exit;
    }

    public function register() {
    $this->view('auth/register');
}

public function process_register() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: ?url=authcontroller/register');
        exit;
    }

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $role     = $_POST['role'] ?? '';

    if ($username === '' || $password === '' || !in_array($role, ['siswa', 'wali'])) {
        $error = 'Data tidak lengkap atau role tidak valid.';
        $this->view('auth/register', compact('error'));
        return;
    }

    $userModel = $this->model('User');
    $existing = $userModel->findByUsername($username);
    if ($existing) {
        $error = 'Username sudah digunakan.';
        $this->view('auth/register', compact('error'));
        return;
    }

    $hash = password_hash($password, PASSWORD_BCRYPT);
    $id_user = $userModel->create($username, $hash, $role);

    // Tambahkan ke tabel siswa atau wali_kelas
    if ($role === 'siswa') {
        $this->model('Siswa')->create($id_user, $_POST['nama'], $_POST['id_kelas']);
    } else {
        $this->model('Wali')->create($id_user, $_POST['nama'], $_POST['id_kelas']);
    }

    header('Location: ?url=authcontroller/login');
    exit;
}
}