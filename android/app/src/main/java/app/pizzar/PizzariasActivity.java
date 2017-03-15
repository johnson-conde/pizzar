package app.pizzar;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import java.util.Collections;
import java.util.List;

import app.pizzar.model.Pizzaria;

public class PizzariasActivity extends AppCompatActivity {
    private SessionManager session;
    private List<Pizzaria> pizzarias;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pizzarias);

        final LinearLayoutManager linearLayoutManager = new LinearLayoutManager(this);
        final RecyclerView recyclerView = (RecyclerView) findViewById(R.id.pizzariasRecycler);
        recyclerView.setLayoutManager(linearLayoutManager);
        session = new SessionManager(getApplicationContext());
        pizzarias = session.getPizzarias();
        final PizzariaAdapter adapter = new PizzariaAdapter(this, pizzarias);
        recyclerView.setAdapter(adapter);
        adapter.setOnItemClickCallback(onItemClickCallback);
    }

    private RecyclerClickListener.OnItemClickCallback onItemClickCallback = new RecyclerClickListener.OnItemClickCallback() {
        @Override
        public void onItemClicked(final View view,
                                  final int parentPosition) {
            session.setPizzariaId(pizzarias.get(parentPosition).id);
            RequestManager.getPizzaria(session, session.getPizzariaId());

            final Intent intent = new Intent(PizzariasActivity.this, MainActivity.class);
            startActivity(intent);
        }

        @Override
        public void onItemClicked(final View view,
                                  final int parentPosition,
                                  final int childPosition) {

        }
    };

    class PizzariaAdapter extends RecyclerView.Adapter<PizzariaAdapter.MyViewHolder> {
        private List<Pizzaria> data = Collections.emptyList();
        private Context context;
        private LayoutInflater inflater;
        private RecyclerClickListener.OnItemClickCallback onItemClickCallback;

        public PizzariaAdapter(final Context context,
                               final List<Pizzaria> data) {
            inflater = LayoutInflater.from(context);
            this.data = data;
            this.context = context;
        }

        public void setOnItemClickCallback(final RecyclerClickListener.OnItemClickCallback onItemClickCallback) {
            this.onItemClickCallback = onItemClickCallback;
        }

        @Override
        public int getItemCount() {
            return data == null ? 0 : data.size();
        }

        @Override
        public MyViewHolder onCreateViewHolder(ViewGroup parent,
                                               int viewType) {
            final View view = inflater.inflate(R.layout.pizzarias_item_layout, parent, false);
            final MyViewHolder holder = new MyViewHolder(view);
            return holder;
        }

        @Override
        public void onBindViewHolder(MyViewHolder holder,
                                     int position) {
            final Pizzaria current = data.get(position);
            holder.nome.setText(current.nome);
            holder.nome.setOnClickListener(new RecyclerClickListener(position, onItemClickCallback));
        }

        class MyViewHolder extends RecyclerView.ViewHolder {
            TextView nome;

            public MyViewHolder(View itemView) {
                super(itemView);
                nome = (TextView) itemView.findViewById(R.id.nome);
            }
        }
    }
}
