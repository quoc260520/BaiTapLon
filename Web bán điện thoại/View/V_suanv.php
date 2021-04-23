<?php
include_once '../Controller/C_suanv.php';
?>
            <div class=" content" >
                <form action="" method="POST" enctype="multipart/form-data">
                            <div >
                                <h2> Cập nhật nhân viên</h2>
                            </div>
                            <div class="giua">
                                    <div >
                                            <label>Tên nhân viên</label>
                                            <input type="text" id="tennv" name="tennv" class="form-control" value="<?php if(isset($_POST["tennv"])){echo $_POST["tennv"];} else {echo $row["TenTv"];}?>" required>
                                    </div>
                                    <div >
                                            <label>Số điện thoại</label>
                                            <input type="text" id="sdt"  name="sodienthoai" class="form-control" minlength="9" maxlength="12" value="<?php if(isset($_POST["sodienthoai"])){echo $_POST["sodienthoai"];} else {echo '0'.$row["SoDienThoai"];}?>" required>
                                    </div>
                                    <div>
                                            <label>Email</label>
                                            <input type="email" id="email" name="email" class="form-control" value="<?php if(isset($_POST["email"])){echo $_POST["email"];} else {echo $row["Email"];}?>" required>
                                    </div>
                                    <div>
                                        <label>Pass</label>
                                        <input type="password" id="pass" name="pass" class="form-control"  minlength="8" maxlength="16" value="<?php if(isset($_POST["pass"])){echo $_POST["pass"];} else {echo $row["Pass"];}?>" required>
                                    </div>
                                   <div >
                                        <label>Chức vụ</label>
                                        <select class="form-control" id="chucvu" name="chucvu" value="<?php if(isset($_POST["chucvu"])){echo $_POST["chucvu"];} else {echo $row["ChucVu"];}?>">
                                            <option>nhanvien </option>
                                        </select>
                                    </div>
                                    <div >
                                            <label>Địa chỉ</label>
                                            <input type="text" id="diachi"  name="diachi" class="form-control" value="<?php if(isset($_POST["diachi"])){echo $_POST["diachi"];} else {echo $rowct["DiaChi"];}?>"  required>
                                    </div>
                                    <div >
                                            <label>Ngày sinh</label>
                                            <input type="date" id="ngaysinh"  name="ngaysinh" class="form-control" value="<?php if(isset($_POST["ngaysinh"])){echo $_POST["ngaysinh"];} else {echo $rowct["NgaySinh"];}?>" required>
                                    </div>
                                    <div >
                                            <label>Giới tính </label>
                                            <select class="form-control" id="gioitinh" name="gioitinh" value="<?php if(isset($_POST["gioitinh"])){echo $_POST["gioitinh"];} else {echo $rowct["GioiTinh"];}?>">
                                                <option>Nam </option>
                                                <option>Nữ </option>
                                            </select>
                                    </div>
                                    <div >
                                        <button type="submit" id="submit" name="submit" class="btn btn-info">Cập nhật</button>
                                    </div>
                             </div>
                </form>
             </div>
          
           