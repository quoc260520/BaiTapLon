package com.example.qlnv;

import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;
import androidx.annotation.NonNull;
import java.util.ArrayList;
import java.util.Date;

public class NhanVien_List extends BaseAdapter{

  Context context;
  ArrayList<NhanVien> list;

    public NhanVien_List(Context context, ArrayList<NhanVien> list) {
        this.context = context;
        this.list = list;
    }

    public NhanVien_List() {

    }

    @Override
    public int getCount() {
        return list.size();
    }

    @Override
    public Object getItem(int position) {
        return null;
    }

    @Override
    public long getItemId(int position) {
        return 0;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        LayoutInflater inflater= (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        View row =inflater.inflate(R.layout.my_list_activity,null);
        ImageView img1 = (ImageView)row.findViewById(R.id.img1);
        TextView tv1=(TextView)row.findViewById(R.id.tv1);
        TextView tv2=(TextView)row.findViewById(R.id.tv2);
        TextView tv3=(TextView)row.findViewById(R.id.tv3);
        TextView tv4=(TextView)row.findViewById(R.id.tv4);
        TextView tv5=(TextView)row.findViewById(R.id.tv5);

        NhanVien nhanVien=list.get(position);
        tv1.setText("Họ tên:"+ nhanVien.hoten);
        tv2.setText("Địa chỉ:"+ nhanVien.diachi);
        tv3.setText("Năm sinh:"+ String.valueOf(nhanVien.namsinh));
        tv4.setText("Email:"+ nhanVien.email);
        tv5.setText("Giới tính:"+ nhanVien.gioitinh);
        Bitmap bita = BitmapFactory.decodeByteArray(nhanVien.anh,0,nhanVien.anh.length);
        img1.setImageBitmap(bita);
        return row;
    }

}
