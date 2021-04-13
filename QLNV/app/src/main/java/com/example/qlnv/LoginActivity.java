package com.example.qlnv;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.Context;
import android.database.Cursor;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class LoginActivity extends AppCompatActivity  {
    private Context context;
    private Button BLg ;
    private Button BSg;
    private EditText EUn;
    private EditText EPw;
    private TextView Tv;
    public String IdTK;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        context=this;
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login);
        SQLite db =new SQLite(this);


        EUn=(EditText)findViewById(R.id.ed1);
        EPw=(EditText)findViewById(R.id.ed2);
        BLg=(Button)findViewById(R.id.btdn);
        BSg=(Button)findViewById(R.id.btdk);

        BLg.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                String s =EUn.getText().toString();
                String s1 =EPw.getText().toString();

                if(EUn.getText().toString().equals("")||EPw.getText().toString().equals(""))
                {
                    Toast.makeText(context,"Không được để trống ", Toast.LENGTH_SHORT).show();
                }

                else
                {
                    Boolean check = db.check(s,s1);
                    Boolean check1 = db.check1(s,s1);
                    Cursor cursor_id= db.GetTk(s,s);
                    cursor_id.moveToFirst();
                    IdTK=cursor_id.getString(0);
                    if (check == true || check1==true)
                    {
                        Intent intent = new Intent(context, MainActivity.class);
                        intent.putExtra("key1",IdTK);
                        startActivity(intent);


                    }
                    else {
                        Toast.makeText(context, "Đăng nhập thất bại", Toast.LENGTH_SHORT).show();
                    }
                }

            }
        });
        BSg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(context, DangKyActivity.class);
                startActivity(intent);
            }
        });

    }
}
