package app.pizzar;

import android.app.ProgressDialog;
import android.content.Context;
import android.util.Log;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.google.common.collect.ArrayListMultimap;
import com.google.common.collect.Multimap;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.List;
import java.util.Map;

import app.pizzar.model.Pizzaria;

public class RequestManager {
    private static ProgressDialog pDialog;
    private static final String TAG = RequestManager.class.getSimpleName();
    private static List<Pizzaria> pizzarias;

    public static void encomendar(final SessionManager session,
                                  final String usuario_id,
                                  final long pizzaria_id,
                                  final long pontos_de_entrega_id,
                                  final long metodo_de_pagamento_id,
                                  final String comentario) {
        // Tag used to cancel the request
        final String tag_string_req = "req_get_encomendas";
        setLoading(true);
        final String url = session.getServerUrl() + AppConfig.ENCOMENDAR_URL;
        final StringRequest strReq = new StringRequest(
                Request.Method.POST,
                url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(final String response) {
                        Log.d(TAG, "Login Response: " + response);
                       // setLoading(false);
                        try {
                            final JSONObject jObj = new JSONObject(response);
                            final boolean error = jObj.getBoolean("erro");
                            // Check for error node in json
                            if (!error) {
                                // user successfully logged in
                                // Now store the user in SQLite

                                // Inserting row in users table
//                                    realm.executeTransaction(new Realm.Transaction() {
//                                        @Override
//                                        public void execute(Realm realm) {
//                                            User.createOrUpdate(realm, name, email, cellphone_number, created_at);
//                                        }
//                                    });
                                // Launch main activity
//                                    final Intent intent = new Intent(LoginActivity.this, MainActivity.class);
//                                    startActivity(intent);
//                                    finish();
                            } else {
                                // Error in login. Get the error message
                                final String errorMsg = jObj.getString("mensagens");
                                Toast.makeText(getApplicationContext(), errorMsg, Toast.LENGTH_LONG).show();
                            }
                        } catch (final JSONException e) {
                            // JSON error
                            e.printStackTrace();
                            Toast.makeText(getApplicationContext(), "Json error: " + e.getMessage(), Toast.LENGTH_LONG).show();
                        }

                    }
                }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e(TAG, "Login Error: " + error.getMessage());
                Toast.makeText(getApplicationContext(), error.getMessage(), Toast.LENGTH_LONG).show();
                setLoading(false);
            }
        }) {
            @Override
            protected Map<String, String> getParams() {
                // Posting parameters to login url
                //Map<String, String> params = new HashMap<>();
                Multimap<String, String> params = ArrayListMultimap.create();
                params.put("pizzaria_id", String.valueOf(pizzaria_id));
                params.put("usuario_id", usuario_id);
                params.put("pontos_de_entrega_id", String.valueOf(pontos_de_entrega_id));
                params.put("metodo_de_pagamento_id", String.valueOf(metodo_de_pagamento_id));
                params.put("comentario", comentario);
                params.put("produto_id", comentario);
                params.put("quantidade", comentario);

                return (Map)params;
            }

        };
        // Adding request to request queue
        MyApplication.getInstance().addToRequestQueue(strReq, tag_string_req);
    }

    public static void getPizzaria(final SessionManager session,
                                   final long pizzaria_id) {
        final String url = session.getServerUrl() + AppConfig.PIZZARIA_URL + "/" + pizzaria_id;
        final String tag_string_req = "req_get_pizzarias";
        final StringRequest stringRequest = new StringRequest(url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                session.setPizzaria(response);
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                session.setPizzaria("");
            }
        });

        // Adding request to request queue
        MyApplication.getInstance().addToRequestQueue(stringRequest, tag_string_req);
    }

    public static void getPizzarias(final SessionManager session) {
        final String url = session.getServerUrl() + AppConfig.PIZZARIAS_URL;
        final String tag_string_req = "req_get_pizzarias";
        final StringRequest stringRequest = new StringRequest(url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                session.setPizzarias(response);
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                session.setPizzarias("[]");
            }
        });

        // Adding request to request queue
        MyApplication.getInstance().addToRequestQueue(stringRequest, tag_string_req);
    }


    public static void getProdutos(final SessionManager session,
                                   final long pizzaria_id) {
        final String url = session.getServerUrl() + AppConfig.PIZZARIAS_PRODUTOS_URL + "/" + pizzaria_id;
        final String tag_string_req = "req_get_produtos";
        final StringRequest stringRequest = new StringRequest(url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                session.setProdutos(response);
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                session.setProdutos("[]");
            }
        });

        // Adding request to request queue
        MyApplication.getInstance().addToRequestQueue(stringRequest, tag_string_req);
    }

    private static void setLoading(final boolean isLoading) {
        //        if (isLoading) {
        //            MyApplication.runOnUiThread()''
        //            pDialog = new ProgressDialog(MyApplication.getInstance());
        //            pDialog.show();
        //            pDialog.setMessage("Encomendando in ...");
        //        } else {
        //            pDialog.dismiss();
        //        }
    }

    public static Context getApplicationContext() {
        return MyApplication.getInstance();
    }
}
