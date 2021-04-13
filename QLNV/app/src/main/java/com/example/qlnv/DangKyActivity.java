package com.example.qlnv;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.os.PersistableBundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

public class DangKyActivity extends AppCompatActivity {
    private EditText EEm;
    private EditText EP;
    private EditText EPw;
    private Button BDk;
    Context context;
    SQLite db = new SQLite( this);
    @Override
    public void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.dangky);
        SQLite db =new SQLite(this);
        context=this;

        EEm=(EditText)findViewById(R.id.ed1);
        EP=(EditText)findViewById(R.id.ed2);
        EPw=(EditText)findViewById(R.id.ed3);
        BDk=(Button)findViewById(R.id.bt1);

        BDk.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String email =EEm.getText().toString();
                String sdt=EP.getText().toString();
                String pass=EPw.getText().toString();

                Boolean checktk= db.check2(email,sdt);
                if(checktk==false ){
                    Boolean checkis = db.insertTK(email,sdt,pass);
                    if(checkis==true)
                    {
                    Toast.makeText(context,"Đăng ký thành công ", Toast.LENGTH_SHORT).show();
                    Intent intent = new Intent(context, LoginActivity.class);
                    startActivity(intent);
                    }
                    else
                    {
                        Toast.makeText(context,"Đăng ký thất bại ", Toast.LENGTH_SHORT).show();
                    }

                }
                else {
                    Toast.makeText(context,"Tài khoản bị trùng ", Toast.LENGTH_SHORT).show();
                }

            }
        });


    }
}
