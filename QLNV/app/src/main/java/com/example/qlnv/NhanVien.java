package com.example.qlnv;

import java.text.BreakIterator;
import java.util.Date;

   public class NhanVien {
        int idtk;
       public String hoten ;
       public String diachi ;
       public int namsinh ;
       public String email ;
       public String gioitinh ;
       public byte[] anh;

       public NhanVien() {
       }


       public NhanVien(int idtk, String hoten, String diachi, int namsinh, String email, String gioitinh, byte[] anh) {
           this.idtk = idtk;
           this.hoten = hoten;
           this.diachi = diachi;
           this.namsinh = namsinh;
           this.email = email;
           this.gioitinh = gioitinh;
           this.anh = anh;
       }

       public int getIdtk() {
           return idtk;
       }

       public void setIdtk(int idtk) {
           this.idtk = idtk;
       }

       public String getHoten() {
           return hoten;
       }

       public void setHoten(String hoten) {
           this.hoten = hoten;
       }

       public String getDiachi() {
           return diachi;
       }

       public void setDiachi(String diachi) {
           this.diachi = diachi;
       }

       public int getNamsinh() {
           return namsinh;
       }

       public void setNamsinh(int namsinh) {
           this.namsinh = namsinh;
       }

       public String getEmail() {
           return email;
       }

       public void setEmail(String email) {
           this.email = email;
       }

       public String getGioitinh() {
           return gioitinh;
       }

       public void setGioitinh(String gioitinh) {
           this.gioitinh = gioitinh;
       }

       public byte[] getAnh() {
           return anh;
       }

       public void setAnh(byte[] anh) {
           this.anh = anh;
       }



       public NhanVien(String hoten, String diachi, int namsinh, String email, String gioitinh, byte[] anh) {
           this.hoten = hoten;
           this.diachi = diachi;
           this.namsinh = namsinh;
           this.email = email;
           this.gioitinh = gioitinh;
           this.anh = anh;
       }
   }

