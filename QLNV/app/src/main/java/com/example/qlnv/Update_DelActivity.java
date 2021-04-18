package com.example.qlnv;

import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.database.Cursor;
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
import android.widget.Toast;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import java.io.ByteArrayOutputStream;
import java.io.FileNotFoundException;
import java.io.InputStream;

public class Update_DelActivity extends AppCompatActivity {
    private Context context;
    private Button BChonUp;
    private Button BChupUp;
    private Button BS;
    private Button BX;
    private EditText EHtUp;
    private EditText EDcUp;
    private EditText ENsUp;
    private EditText EEmUp;
    private EditText EGtUp;
    private ImageView ImgUp;
    final  int RESQUEST_TAKE_PHOTO= 123;
    final  int REQUEST_CHOOSE_PHOTO= 456;
    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.update_delete_activity);
        SQLite db= new SQLite(this);
        Intent intent = getIntent();
        context = this;
        EHtUp = (EditText) findViewById(R.id.ed1Up);
        EDcUp = (EditText) findViewById(R.id.ed2Up);
        ENsUp = (EditText) findViewById(R.id.ed3Up);
        EEmUp = (EditText) findViewById(R.id.ed4Up);
        EGtUp = (EditText) findViewById(R.id.ed5Up);
        BS = (Button) findViewById(R.id.btnS);
        BX= (Button) findViewById(R.id.btnX);
        BChonUp = (Button) findViewById(R.id.btnChonUp);
        BChupUp = (Button) findViewById(R.id.btnChupUp);
        ImgUp=(ImageView)findViewById(R.id.imgAnhUp) ;


        String hoten= intent.getStringExtra("hoten");
        String diachi= intent.getStringExtra("diachi");
        String namsinh= intent.getStringExtra("namsinh");
        String email= intent.getStringExtra("email");
        String gioitinh= intent.getStringExtra("gioitinh");
        Bundle extras = getIntent().getExtras();
        byte[] anh = extras.getByteArray("anh");

        EHtUp.setText(hoten);
        EDcUp.setText(diachi);
        ENsUp.setText(namsinh);
        EEmUp.setText(email);
        EGtUp.setText(gioitinh);
        Bitmap bit = BitmapFactory.decodeByteArray(anh,0,anh.length);
        ImgUp.setImageBitmap(bit);


        BChonUp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                choosePhoto();
            }
        });
        BChupUp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                takePicture();
            }
        });
        Cursor cursor =db.GetIdnv(email);
        cursor.moveToFirst();
        String idnv= cursor.getString(0);

        BS.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String email=EEmUp.getText().toString();
                String hoten=EHtUp.getText().toString();
                String diachi=EDcUp.getText().toString();
                int namsinh=Integer.parseInt(ENsUp.getText().toString());
                byte [] anh= getByteArrayFromImageView(ImgUp);
                String gioitinh =EGtUp.getText().toString();

                if(email.equals("")||hoten.equals("")||diachi.equals("")||anh.equals("")||gioitinh.equals("")){
                    Toast.makeText(context,"Vui lòng điền đủ thông tin ", Toast.LENGTH_SHORT).show();
                }
                else {
                    boolean checknvup= db.checknvup(email,idnv);
                    if(checknvup==true)
                    {
                        Toast.makeText(context," Email nhân viên đã tồn tại ", Toast.LENGTH_SHORT).show();
                    }
                    else
                    {
                        boolean checkUpNv= db.UpdateNv(idnv,hoten,diachi,namsinh,email,anh,gioitinh);
                        if( checkUpNv==true)
                        {
                            Toast.makeText(context,"Cập nhật thành công ", Toast.LENGTH_SHORT).show();
                            Intent intent =new Intent(context,MainActivity.class);
                            startActivity(intent);

                        }
                        else
                        {
                            Toast.makeText(context,"Cập nhật  thất bại ", Toast.LENGTH_SHORT).show();
                        }
                    }

                }


            }

        });

        BX.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                AlertDialog.Builder builder = new AlertDialog.Builder(context);
                builder.setIcon(android.R.drawable.ic_delete);
                builder.setTitle("Xác nhận xóa ");
                builder .setMessage("Bạn có muốn xóa nhân viên này không ?");
                builder.setPositiveButton("Có ", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        Boolean checkdl = db.DeleteNv(idnv);
                        if(checkdl==true){
                            Toast.makeText(context,"Xóa thành công ", Toast.LENGTH_SHORT).show();
                            Intent intent=new Intent(context,MainActivity.class);
                            startActivity(intent);
                        }
                        else
                            Toast.makeText(context,"Nhân viên chưa được xóa" , Toast.LENGTH_SHORT).show();
                    }
                });

                builder.setNegativeButton("Không", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {

                    }
                });
                AlertDialog dialog=builder.create();
                dialog.show();

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
                    ImgUp.setImageBitmap(bitmap);


                } catch (FileNotFoundException e) {
                    e.printStackTrace();
                }
            }else if(requestCode==RESQUEST_TAKE_PHOTO  ){
                Bitmap bitmap=(Bitmap) data.getExtras().get("data");
                ImgUp.setImageBitmap(bitmap);
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



