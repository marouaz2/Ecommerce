<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesItemsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commandes_items', function (Blueprint $table) {
            $table->unsignedBigInteger('commandes_id');
            $table->unsignedBigInteger('produits_id');
            $table->integer('quantite');
            $table->foreign('commandes_id')->references('id')->on('commandes')->onDelete('cascade');
            $table->foreign('produits_id')->references('id')->on('produits')->onDelete('cascade');
            $table->primary(['commandes_id', 'produits_id']);
    });
        }
    
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('commandes_items');
        }
};
