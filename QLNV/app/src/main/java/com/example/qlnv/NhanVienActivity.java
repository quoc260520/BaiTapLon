package com.example.qlnv;

import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.drawable.BitmapDrawable;
import android.net.Uri;
import android.os.Bundle;
import android.provider.MediaStore;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import java.io.ByteArrayOutputStream;
import java.io.FileNotFoundException;
import java.io.InputStream;

public class NhanVienActivity extends AppCompatActivity {
    private Context context;
    private Button BChon;
    private Button BChup;
    private Button BT;
    private EditText EHt;
    private EditText EDc;
    private EditText ENs;
    private EditText EEm;
    private EditText EGt;
    private ImageView Img;
    final  int RESQUEST_TAKE_PHOTO= 123;
    final  int REQUEST_CHOOSE_PHOTO= 456;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.insert_activity);
         SQLite db= new SQLite(this);

        context = this;
        EHt = (EditText) findViewById(R.id.ed1);
        EDc = (EditText) findViewById(R.id.ed2);
        ENs = (EditText) findViewById(R.id.ed3);
        EEm = (EditText) findViewById(R.id.ed4);
        EGt = (EditText) findViewById(R.id.ed5);
        BT = (Button) findViewById(R.id.btnT);
        BChon = (Button) findViewById(R.id.btnChon);
        BChup = (Button) findViewById(R.id.btnChup);
        Img=(ImageView)findViewById(R.id.imgAnh) ;


        BChon.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
               choosePhoto();
            }
        });
        BChup.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                takePicture();
            }
        });

        BT.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String email=EEm.getText().toString();
                String hoten=EHt.getText().toString();
                String diachi=EDc.getText().toString();
                int namsinh=Integer.parseInt(ENs.getText().toString());
                byte [] anh= getByteArrayFromImageView(Img);
                String gioitinh =EGt.getText().toString();

                if(email.equals("")||hoten.equals("")||diachi.equals("")||anh.equals("")||gioitinh.equals("")){
                    Toast.makeText(context,"Vui lòng điền đủ thông tin ", Toast.LENGTH_SHORT).show();
                }
                else {
                    boolean checknv= db.checknv(email);
                    if(checknv==true)
                    {
                        Toast.makeText(context," Email nhân viên đã tồn tại ", Toast.LENGTH_SHORT).show();
                    }
                    else
                        {
                            boolean checkinsertnv= db.insertNV(hoten,diachi,namsinh,email,anh,gioitinh);
                        if( checkinsertnv==true)
                    {
                        Toast.makeText(context,"Thêm thành công ", Toast.LENGTH_SHORT).show();
                        Intent intent =new Intent(context,MainActivity.class);
                        startActivity(intent);

                    }
                    else
                    {
                        Toast.makeText(context,"Thêm thất bại ", Toast.LENGTH_SHORT).show();
                    }
                    }
                    
                }


            }

        });
    }
    private void takePicture() //chup hinh
    {
        Intent intent=new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
        startActivityForResult(intent,RESQUEST_TAKE_PHOTO);
    }
    private void choosePhoto() //chon hinh
    {
        Intent intent=new Intent(Intent.ACTION_PICK);
        intent.setType("image/*");
        startActivityForResult(intent,REQUEST_CHOOSE_PHOTO);
    }


    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if(resultCode==RESULT_OK)
        {
            if(requestCode==REQUEST_CHOOSE_PHOTO){
                try {
                    Uri imageUri =data.getData();
                    InputStream is=getContentResolver().openInputStream(imageUri);
                    Bitmap bitmap = BitmapFactory.decodeStream(is);
                    Img.setImageBitmap(bitmap);


                } catch (FileNotFoundException e) {
                    e.printStackTrace();
                }
            }else if(requestCode==RESQUEST_TAKE_PHOTO  ){
                Bitmap bitmap=(Bitmap) data.getExtras().get("data");
                Img.setImageBitmap(bitmap);
            }

        }
    }

    private byte[] getByteArrayFromImageView(ImageView imgv){

        BitmapDrawable drawable = (BitmapDrawable) imgv.getDrawable();
        Bitmap bmp = drawable.getBitmap();

        ByteArrayOutputStream stream = new ByteArrayOutputStream();
        bmp.compress(Bitmap.CompressFormat.PNG, 0, stream);
        byte[] byteArray = stream.toByteArray();
        return byteArray;
    }
}


