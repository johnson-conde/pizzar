package app.pizzar;

import android.content.Context;
import android.graphics.Color;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;

import java.util.Collections;
import java.util.List;

import app.pizzar.model.Pizzaria;

public class MainActivity extends AppCompatActivity implements View.OnClickListener {
    private static final String TAG = MainActivity.class.getSimpleName();
    private SessionManager session;
    private Button btnEncomendar;
    //    private Spinner spinnerPizzaria;
    private EditText edtUsuarioId;
    private Spinner spinnerPontodDeEntrega;
    private Spinner spinnerMetodosDePagamento;
    private EditText edtComentario;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        // Session manager
        session = new SessionManager(getApplicationContext());
        btnEncomendar = (Button) findViewById(R.id.btnEncomendar);
        btnEncomendar.setOnClickListener(this);

        if (getSupportActionBar() != null) {
            if (session.getPizzaria() != null) {
                getSupportActionBar().setTitle(session.getPizzaria().nome);
            }
        }
        final List<Pizzaria> pizzarias = session.getPizzarias();
        edtUsuarioId = (EditText) findViewById(R.id.usuario);
        spinnerPontodDeEntrega = (Spinner) findViewById(R.id.pontos_de_entrega);
        spinnerPontodDeEntrega.setAdapter(new PizzariaAdapter(this, pizzarias));
        spinnerMetodosDePagamento = (Spinner) findViewById(R.id.metodos_de_pagamento);
        spinnerMetodosDePagamento.setAdapter(new PizzariaAdapter(this, pizzarias));
        edtComentario = (EditText) findViewById(R.id.comentario);
    }

    @Override
    public void onClick(View view) {
        int id = view.getId();

        if (id == R.id.btnEncomendar) {
            RequestManager.encomendar(session,
                    edtUsuarioId.getText().toString(),
                    session.getPizzariaId(),
                    spinnerPontodDeEntrega.getSelectedItemId(),
                    spinnerMetodosDePagamento.getSelectedItemId(),
                    edtComentario.getText().toString());
        }
    }

    private class PizzariaAdapter extends ArrayAdapter<Pizzaria> {
        private List<Pizzaria> pizzarias = Collections.emptyList();
        private Context context;
        private LayoutInflater inflater;

        PizzariaAdapter(final Context context,
                        final List<Pizzaria> pizzarias) {
            super(context, android.R.layout.simple_list_item_1, pizzarias);
            this.context = context;
            this.pizzarias = pizzarias;
            inflater = LayoutInflater.from(context);
        }

        @Override
        public int getCount() {
            return pizzarias == null ? 0 : pizzarias.size();
        }

        @Override
        public Pizzaria getItem(int i) {
            return pizzarias.get(i);
        }

        @Override
        public long getItemId(int i) {
            return pizzarias.get(i).id;
        }

        @Override
        public View getView(final int position,
                            View view,
                            final ViewGroup viewGroup) {
            final TextView label = new TextView(context);
            label.setTextColor(Color.BLACK);
            label.setText(pizzarias.toArray(new Object[pizzarias.size()])[position]
                    .toString());
            return label;
        }
    }
}
