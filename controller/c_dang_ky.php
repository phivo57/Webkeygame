<?php
include_once('models/dang_ky.php');
class C_Dang_ky
{
    public function Hien_thi_dang_ky(){
        // Models
        if(isset($_POST["dk"]))
        {
            if(isset($_POST["ten"])) $ten = $_POST["ten"];
            if(isset($_POST["email"])) $email_dk = $_POST["email"];
            if(isset($_POST["password"])) $mk = $_POST["password"];
            $dk = new dang_ky();
            $kq = $dk->doc_khach_hang();
            $kiemtra=false;
            //var_dump($kq);
            foreach($kq as $e)
            {
                if($e['email']== $email_dk)
                {   
                    $_SESSION['error'] = "Tài khoản tồn tại";
                    $kiemtra=true;
                    break;
                }
            }
            if($kiemtra==false){
                    $kq = $dk->Dk_khach_hang($ten,$email_dk,md5($mk));
                    $_SESSION['thanh_cong'] ="Bạn đăng kí thành công quay về trang <a href='login.php'>đăng nhập<a>";
            }


            
            
    }
        // Views
        $title="Đăng Ký";
        require_once("views/v_dang_ky/layouts.php");
    }
    
}
?>