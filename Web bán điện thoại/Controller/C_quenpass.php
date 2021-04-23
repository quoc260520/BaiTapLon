<?php
    include_once '../Model/ketnoi.php';
    if(isset($_POST["submit"]))
    {
        $sodienthoai=$_POST["sodienthoai"];
        $sql="select sodienthoai from thanhvien where SoDienThoai='$sodienthoai'";
        $thuchien=mysqli_query($conn,$sql);
        $rown=mysqli_num_rows($thuchien);
        if($rown>0)
        {
            echo '<center class="alert alert-success">Vui lòng kiểm tra thông tin mật khẩu gửi về số điện thoại <i class="fa fa-check" aria-hidden="true"></i> <a href="./V_index.php">Đăng Nhập Ngay</a> </center>"';
        }
        else
        {
            echo '<center class="alert alert-danger"> Số điện thoại không hợp lệ. Vui lòng kiểm tra lại!!! <a href="./V_index.php">Quay Lại</a></center>"';
        }
    }
?>
