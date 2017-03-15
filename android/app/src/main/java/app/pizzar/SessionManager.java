package app.pizzar;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.SharedPreferences;
import android.util.Log;

import com.google.gson.Gson;
import com.google.gson.GsonBuilder;
import com.google.gson.reflect.TypeToken;

import java.lang.reflect.Type;
import java.util.List;

import app.pizzar.model.Pizzaria;
import app.pizzar.model.Produto;

public class SessionManager {
    // LogCat tag
    private static String TAG = SessionManager.class.getSimpleName();
    // Shared Preferences
    private SharedPreferences pref;
    private SharedPreferences.Editor editor;
    private Context _context;
    // Shared pref mode
    int PRIVATE_MODE = 0;
    // Shared preferences file name
    private static final String PREF_NAME = "AndroidGeofenceLogin";
    private static final String KEY_IS_LOGGEDIN = "isLoggedIn";
    private static final String KEY_SERVER_URL = "server_url";
    private static final String KEY_PIZZARIAS = "pizzarias";
    private static final String KEY_PIZZARIAS_PRODUTOS = "produtos";
    private static final String KEY_PIZZARIA_ID = "pizzaria_id";
    private static final String KEY_PIZZARIA = "pizzaria";

    @SuppressLint("CommitPrefEdits")
    public SessionManager(Context context) {
        this._context = context;
        pref = _context.getSharedPreferences(PREF_NAME, PRIVATE_MODE);
        editor = pref.edit();
    }

    public void setLogin(final boolean isLoggedIn) {
        editor.putBoolean(KEY_IS_LOGGEDIN, isLoggedIn);
        // commit changes
        editor.apply();
    }

    public void setServerUrl(final String serverUrl) {
        editor.putString(KEY_SERVER_URL, serverUrl);
        // commit changes
        editor.apply();
    }

    public boolean isLoggedIn(){
        return pref.getBoolean(KEY_IS_LOGGEDIN, false);
    }

    public String getServerUrl(){
        return "http://192.168.43.102:8000";
        //return pref.getString(KEY_SERVER_URL, "http://www.contextaware.lubelnaportal.com/");
    }

    public void setPizzariaId(final long pizzarias) {
        editor.putLong(KEY_PIZZARIA_ID, pizzarias);
        // commit changes
        editor.apply();
    }

    public long getPizzariaId(){
        return pref.getLong(KEY_PIZZARIA_ID, 1);
    }

    public void setPizzaria(final String pizzarias) {
        editor.putString(KEY_PIZZARIA, pizzarias);
        // commit changes
        editor.apply();
    }

    public Pizzaria getPizzaria(){
        final Gson gson = new GsonBuilder().create();
        return gson.fromJson(pref.getString(KEY_PIZZARIA, "{}"), Pizzaria.class);
    }

    public void setPizzarias(final String pizzarias) {
        editor.putString(KEY_PIZZARIAS, pizzarias);
        // commit changes
        editor.apply();
    }

    public List<Pizzaria> getPizzarias(){
        final Gson gson = new GsonBuilder().create();
        final Type type = new TypeToken<List<Pizzaria>>() {
        }.getType();
        return gson.fromJson(pref.getString(KEY_PIZZARIAS, "[]"), type);
    }

    public void setProdutos(final String pizzarias) {
        editor.putString(KEY_PIZZARIAS_PRODUTOS, pizzarias);
        // commit changes
        editor.apply();
    }

    public List<Produto> getProdutos(){
        final Gson gson = new GsonBuilder().create();
        final Type type = new TypeToken<List<Produto>>() {
        }.getType();
        return gson.fromJson(pref.getString(KEY_PIZZARIAS_PRODUTOS, "[]"), type);
    }
}
