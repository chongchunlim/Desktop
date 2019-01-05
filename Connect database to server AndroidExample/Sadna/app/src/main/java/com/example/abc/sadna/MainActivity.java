package com.example.abc.sadna;

import android.content.Intent;
import android.os.StrictMode;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {
    Button btnViewProducts,btnAddPatient;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        if (android.os.Build.VERSION.SDK_INT > 9) {
            StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }
        btnViewProducts = (Button) findViewById(R.id.btnViewProducts);
        btnViewProducts.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View view) {
                // Launching All products Activity
                Intent i = new Intent(getApplicationContext(), patient_info.class);
                startActivity(i);

            }

});
        btnAddPatient=(Button)findViewById(R.id.btnAddPatient);
        btnAddPatient.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent  i = new Intent(getApplicationContext(), AddNewPatient.class);
                startActivity(i);
            }
        });
    }
}