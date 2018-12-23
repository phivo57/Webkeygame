<?php
@session_start();
include_once('models/dang_nhap.php');
class C_Login
{
    public function Hien_thi_login(){
        if(isset($_POST['dn']))
        {
            if(isset($_POST['name'])) $user = $_POST['name'];
            if(isset($_POST['password'])) $pas = $_POST['password'];
            $dn = new dang_nhap();
            $login = $dn->Doc_khach_hang_theo_tenDn_pass($user,$pas);
            //var_dump($login);
            if($login!==false)
            {
                
                $_SESSION['ten_khach_hang'] = $login['ten_khach_hang'];
                $_SESSION['ma_khach_hang'] = $login['ma_khach_hang'];
                header("location:index.php");
            }
            else
            {
                $_SESSION['error'] = "Tài khoản hoặc mật khẩu không tồn tại";
            }
        }

        $title="Đăng Nhập";
        require_once("views/v_login/layouts.php");
    }
}
?>