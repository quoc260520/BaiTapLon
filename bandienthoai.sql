
create table  THANHVIEN (
  IdTv int not null auto_increment primary key  ,
  TenTv varchar(100) ,
  SoDienThoai int not null,
  Email varchar(50) unique  ,
  Pass varchar(50) ,
  ChucVu varchar(55) default "khachhang" );
  
 create table  LOAIHANG (
   IdLoai int not null AUTO_INCREMENT primary key,
   TenLoai nvarchar(50));
   
  
 create table  SANPHAM (
 IdSp int not null  AUTO_INCREMENT primary key ,
 IdLoai int ,
 TenSp varchar(255) ,
 Anh varchar(255),
 Gia float ,
 BaoHanh varchar(20) ,
 TinhTrang varchar(100),
 KhuyenMai varchar(255),
 TrangThai varchar(100) ,
 MoTa varchar(255),
 foreign key (IdLoai)references loaihang(IdLoai));

 create table  NHANVIEN (
   IdNv int not null  AUTO_INCREMENT primary key
  IdTv int not null   ,
  DiaChi varchar(255) ,
  NgaySinh date ,
  GioiTinh varchar(50)   ,
  foreign key (IdTv)references THANHVIEN(IdTv))
  ;
 
 
 
 INSERT INTO THANHVIEN (IdTv, TenTv,SoDienThoai, Email, Pass, ChucVu) VALUES (NULL, 'admin', '0354140072', 'admin@gmail.com', '1234', 'quanly')
 
 