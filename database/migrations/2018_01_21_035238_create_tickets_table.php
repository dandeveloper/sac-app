<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->enum('type',
            [
                'Telefone',
                'Chat',
                'Email'
            ]);
            $table->enum('state',
            [
                'AC', // Acre
                'AL', // Alagoas
                'AP', // Amapá
                'AM', // Amazonas
                'BA', // Bahia
                'CE', // Ceará
                'DF', // Distrito Federal
                'ES', // Espírito Santo
                'GO', // Goiás
                'MA', // Maranhão
                'MT', // Mato Grosso
                'MS', // Mato Grosso do Sul
                'MG', // Minas Gerais
                'PA', // Pará
                'PB', // Paraíba
                'PR', // Paraná
                'PE', // Pernambuco
                'PI', // Piauí
                'RR', // Roraima
                'RO', // Rondônia
                'RJ', // Rio de Janeiro
                'RN', // Rio Grande do Norte
                'RS', // Rio Grande do Sul
                'SC', // Santa Catarina
                'SP', // São Paulo
                'SE', // Sergipe
                'TO'  // Tocantins
            ]);
            $table->enum('subject',
            [
                'Dúvidas',
                'Elogios',
                'Sugestões'
            ]);
            $table->text('details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
