package com.example.qlnv;

import android.content.Context;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

public class ThongTinActivity extends AppCompatActivity {
    private Button BC ;
    private  Button BFb;
    Context context;
    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.thongtin_activity);
        context=this;
        BC=(Button)findViewById(R.id.Bc);
        BFb=(Button)findViewById(R.id.Bfb);
        BC.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent= new Intent(Intent.ACTION_DIAL);
                intent.setData(Uri.parse("tel:0354140072"));
                startActivity(intent);
            }
        });

        BFb.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent= new Intent(Intent.ACTION_VIEW);
                intent.setData(Uri.parse("https://www.facebook.com/quocdan.tocxoan"));
                startActivity(intent);
            }
        });
    }
}
