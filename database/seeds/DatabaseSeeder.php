<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Categoria;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::statement("SET FOREIGN_KEY_CHECKS = 0;");
        $this->call(UserTableSeeder::class);
        $this->call(CategoriaTableSeeder::class);
        $this->call(PizzariaTableSeeder::class);
        $this->call(ProdutoTableSeeder::class);
        $this->call(PontosDeEntregaTableSeeder::class);
        $this->call(MetodosDePagamentoTableSeeder::class);
        DB::statement("SET FOREIGN_KEY_CHECKS = 1;");
    }
}
