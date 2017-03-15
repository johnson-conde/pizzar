package app.pizzar;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;

import app.pizzar.model.Pizzaria;

public class SplashScreenActivity extends Activity {
    private SessionManager session;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_splash_screen);
        session = new SessionManager(getApplicationContext());
        RequestManager.getPizzarias(session);
        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                final Intent intent = new Intent(SplashScreenActivity.this, PizzariasActivity.class);
                startActivity(intent);
            }
        }, 5000);
    }
}
