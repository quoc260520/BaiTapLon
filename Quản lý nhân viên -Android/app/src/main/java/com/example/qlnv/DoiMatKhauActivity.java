package com.example.qlnv;

import android.content.Context;
import android.content.Intent;
import android.database.Cursor;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

public class DoiMatKhauActivity extends AppCompatActivity {
    private EditText EEm;
    private EditText EPc;
    private EditText EPm;
    private Button BXn;
    private Button BH;
    Context context;
    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.doimatkhau_activyty);
        context=this;
        SQLite db= new SQLite(this);
        EEm=(EditText)findViewById(R.id.edĐp1);
        EPc=(EditText)findViewById(R.id.edĐp2);
        EPm=(EditText)findViewById(R.id.edĐp3);
        BXn=(Button)findViewById(R.id.btXn);
        BH=(Button)findViewById(R.id.btH);

        BH.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(context,LoginActivity.class);
                startActivity(intent);
            }
        });


        BXn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String s1=EEm.getText().toString();
                String s2=EPc.getText().toString();
                String s3=EPm.getText().toString();

                Cursor cursor=db.GetTk1(s1,s1);
                cursor.moveToFirst();

                Boolean check = db.check(s1,s2);
                Boolean check1 = db.check1(s1,s2);

                if(check==true||check1==true)
                {
                    if(s3.length()<8||s3.length()>16)
                    {
                        Toast.makeText(context, "Mật khẩu phải từ 8 đến 16 kí tự", Toast.LENGTH_SHORT).show();
                    }
                    else
                    {

                        String id= cursor.getString(0).toString();
                        String email=cursor.getString(1).toString();
                        String sdt=cursor.getString(2).toString();

                        Toast.makeText(context, id, Toast.LENGTH_SHORT).show();

                        Boolean checkdoi =db.UpdateTk(id,email,sdt,s3);
                        if (checkdoi==true )
                        {
                            Toast.makeText(context, "Đổi mật khẩu thành công mời bạn đăng nhập", Toast.LENGTH_SHORT).show();
                        }
                        else {
                            Toast.makeText(context, "Đổi mật khẩu không thành công", Toast.LENGTH_SHORT).show();
                        }
                    }


                }
                else {
                    Toast.makeText(context, "Bạn nhập sai thông tin", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }
}
