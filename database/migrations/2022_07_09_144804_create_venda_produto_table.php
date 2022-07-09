<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda_produto', function (Blueprint $table) {
            $table->id();

            $table->foreignId('venda_id')
                ->references('id')
                ->on('venda')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('produto_id')
                ->references('id')
                ->on('produto')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->integer('quantidade')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venda_produto');
    }
};
