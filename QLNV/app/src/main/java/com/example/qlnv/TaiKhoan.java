package com.example.qlnv;

public class TaiKhoan {

    public int id ;
    public String email ;
    public String sodienthoai ;
    public String pass ;

    public TaiKhoan(String email, String sodienthoai, String pass) {
        this.email = email;
        this.sodienthoai = sodienthoai;
        this.pass = pass;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getSodienthoai() {
        return sodienthoai;
    }

    public void setSodienthoai(String sodienthoai) {
        this.sodienthoai = sodienthoai;
    }

    public String getPass() {
        return pass;
    }

    public void setPass(String pass) {
        this.pass = pass;
    }

    public TaiKhoan() {
    }
    public TaiKhoan(int id, String email, String sodienthoai, String pass) {
        this.id = id;
        this.email = email;
        this.sodienthoai = sodienthoai;
        this.pass = pass;
    }
}
