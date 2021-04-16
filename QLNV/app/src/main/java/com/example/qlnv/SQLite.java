package com.example.qlnv;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.os.Bundle;
import android.util.Log;

import androidx.annotation.Nullable;

import java.sql.Blob;

public class SQLite extends SQLiteOpenHelper {

    private Context context;



    public SQLite(@Nullable Context context) {
        super(context, "QLNV.db", null, 1);
        this.context = context;

    }

    public Boolean check(String email, String pass) {
        SQLiteDatabase database = getReadableDatabase();
        Cursor cursorC = database.rawQuery("select * from TAIKHOAN where Email=?  and Pass=?", new String[]{email, pass});
        if (cursorC.getCount() > 0)
            return true;
        else
            return false;
    }

    public Boolean check1(String sodienthoai, String pass) {
        SQLiteDatabase database = getReadableDatabase();
        Cursor cursorC1 = database.rawQuery("select * from TAIKHOAN where SoDienThoai=?  and Pass=?", new String[]{sodienthoai, pass});
        if (cursorC1.getCount() > 0)
            return true;
        else
            return false;
    }
    public Boolean check2(String email, String sodienthoai) {
        SQLiteDatabase database = getReadableDatabase();
        Cursor cursorC = database.rawQuery("select * from TAIKHOAN where Email=?  or SoDienThoai=?", new String[]{email, sodienthoai});
        if (cursorC.getCount() > 0)
            return true;
        else
            return false;
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL("create table if not exists TAIKHOAN(IdTk integer primary key AUTOINCREMENT, Email text , SoDienThoai text , Pass text)");
        db.execSQL("create table if not exists NHANVIEN(IdNv integer primary key AUTOINCREMENT , IdTk integer , HoTen text , DiaChi text , NamSinh integer , Email text ,Anh blob, GioiTinh text , FOREIGN KEY (IdTk) REFERENCES TAIKHOAN (IdTk))");

    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

    }
    public Boolean insertTK (String email,String sdt,String pass)
    {
        SQLiteDatabase db=this.getWritableDatabase();
        ContentValues contentValues=new ContentValues();
        contentValues.put("Email",email);
        contentValues.put("SoDienThoai",sdt);
        contentValues.put("Pass",pass);
        long result = db.insert("TAIKHOAN",null,contentValues);
        if(result==-1){
            return  false;
        }
        else {
            return true;
        }
    }
    public Boolean insertNV (int idtk, String hoten, String diachi, int namsinh, String email, byte[] anh , String gioitinh)
    {
        SQLiteDatabase db=this.getWritableDatabase();
        ContentValues contentValues=new ContentValues();
        contentValues.put("IdTk",idtk);
        contentValues.put("HoTen",hoten);
        contentValues.put("DiaChi",diachi);
        contentValues.put("NamSinh",namsinh);
        contentValues.put("Email",email);
        contentValues.put("Anh", anh);
        contentValues.put("GioiTinh",gioitinh);

        long result = db.insert("NHANVIEN",null,contentValues);
        if(result==-1){
            return  false;
        }
        else {
            return true;
        }
    }

    public Boolean checknv(String email) {
        SQLiteDatabase database = getReadableDatabase();
        Cursor cursorNV = database.rawQuery("select * from NHANVIEN where Email=? ",new String[]{email});
        if (cursorNV.getCount() > 0)
            return true;
        else
            return false;
    }

    public Cursor GetNv (String idtk)
    {
        SQLiteDatabase db=this.getReadableDatabase();
        return db.rawQuery("select * from NHANVIEN where IdTk= ?", new String[] {idtk});

    }
    public Cursor GetTk (String email,String sdt)
    {
        SQLiteDatabase db=this.getReadableDatabase();
        return db.rawQuery("select IdTk from TAIKHOAN where Email=? or SoDienThoai=?",new String[]{email, sdt});

    }
}


