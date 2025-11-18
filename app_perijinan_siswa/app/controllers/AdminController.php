<?php
class AdminController extends Controller {
    public function __construct(){
        if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin'){
            header("Location: /auth/login"); exit;
        }
    }

    public function dashboard(){
        $data['leaves'] = $this->model('Leave')->getAll();
        $this->view('admin/leave_manage',$data);
    }

    public function approve($id_request){
        $leave = $this->model('Leave');
        $leave->updateStatus($id_request,'approved',NULL);
        header("Location: /admin/dashboard");
    }

    public function reject($id_request){
        $leave = $this->model('Leave');
        $leave->updateStatus($id_request,'rejected',NULL);
        header("Location: /admin/dashboard");
    }
}
