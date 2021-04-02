<?php
include_once '../Controller/C_themnv.php';
?>
   
                <div class=" content" >
                    <form action="#" method="POST">
                            <div >
                                <h2> Thêm nhân viên mới</h2>
                            </div>
                            <div class="giua">
                                    <div class="">
                                            <label>Tên nhân viên</label>
                                            <input type="text" id="tennv" name="tennv" class="form-control" required>
                                    </div>
                                    <div >
                                            <label>Số điện thoại</label>
                                            <input type="text" id="sdt"  name="sodienthoai" class="form-control" minlenght="9" maxlength="12" required>
                                    </div>
                                    <div>
                                            <label>Email</label>
                                            <input type="email" id="email" name="email" class="form-control" required>
                                    </div>
                                    <div>
                                        <label>Pass</label>
                                        <input type="password" id="pass" name="pass" class="form-control"  minlength="8" maxlength="16" required>
                                    </div>
                                   <div >
                                        <label>Chức vụ</label>
                                        <select class="form-control" id="chucvu" name="chucvu">
                                            <option>nhanvien </option>
                                        </select>
                                    </div>
                                    <div >
                                            <label>Địa chỉ</label>
                                            <input type="text" id="diachi"  name="diachi" class="form-control"  required>
                                    </div>
                                    <div >
                                            <label>Ngày sinh</label>
                                            <input type="date" id="ngaysinh"  name="ngaysinh" class="form-control"  required>
                                    </div>
                                    <div >
                                            <label>Giới tính </label>
                                            <select class="form-control" id="gioitinh" name="gioitinh">
                                                <option>Nam </option>
                                                <option>Nữ </option>
                                            </select>
                                    </div>
                                    
                                    <div >
                                        <button type="submit" id="submit" name="submit" class="btn btn-info">Thêm mới </button>
                                     
                                    </div>
                             </div>
                    </form>
                </div>
          
           