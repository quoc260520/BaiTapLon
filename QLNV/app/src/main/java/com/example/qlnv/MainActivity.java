package com.example.qlnv;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.media.browse.MediaBrowser;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.ListView;
import android.widget.Toast;

import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {
    ListView listView;
    ArrayList<NhanVien> list;
    NhanVien_List adapter ;
    Context context;
    private Button BtnT;
    public String idtk;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

       SQLite db =new SQLite(this);
        context=this;
        listView=(ListView)findViewById(R.id.lvds);
        list= new ArrayList<>();
        adapter =new NhanVien_List(this,list);
        listView.setAdapter(adapter);
        Intent intent=getIntent();
        idtk= intent.getStringExtra("key1");
        Cursor cursorNV =db.GetNv(idtk);
        cursorNV.moveToFirst();
        BtnT=(Button)findViewById(R.id.btnT);
        BtnT.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(context, NhanVienActivity.class);
                intent.putExtra("key2",idtk);
                startActivity(intent);
            }
        });
        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                String hoTen= list.get(position).getHoten().toString();
                String diaChi=list.get(position).getDiachi().toString();
                int namSinh=(list.get(position).getNamsinh());
                String email=list.get(position).getEmail().toString();
                String gioiTinh=list.get(position).getGioitinh().toString();
                byte [] anh =list.get(position).getAnh();
                Intent intent =new Intent(context,Update_DelActivity.class);
                intent.putExtra("hoten",hoTen);
                intent.putExtra("diachi",diaChi);
                intent.putExtra("namsinh",namSinh);
                intent.putExtra("email",email);
                intent.putExtra("gioitinh",gioiTinh);
                intent.putExtra("anh",anh);
                startActivity(intent);
            }
        });
        list.clear();
     for(int i=0;i<cursorNV.getCount();i++){
            cursorNV.moveToPosition(i);
            String hoten =cursorNV.getString(2);
            String diachi =cursorNV.getString(3);
            int namsinh =cursorNV.getInt(4);
            String email =cursorNV.getString(5);
            byte[] anh =cursorNV.getBlob(6);
            String gioitinh =cursorNV.getString(7);

            list.add(new NhanVien(hoten,diachi,namsinh,email,gioitinh,anh));


        }
        adapter.notifyDataSetChanged(); 


    }


}