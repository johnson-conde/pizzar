package app.pizzar.model;

public class Pizzaria {
    public long id;
    public String nome;
    public String contacto;
    public String email;
    public String endereco;
    public String imagem;
    public String username;
    public String password;
    public String descricao;
    public String created_at;
    public String updated_at;

    @Override
    public String toString() {
        return nome;
    }
}
