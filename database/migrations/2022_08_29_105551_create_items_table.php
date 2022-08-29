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
        Schema::create('items', function (Blueprint $table) {
            $table->string('id');
            $table->string('name');
            $table->text('description');
            $table->integer('quantity');
            $table->integer('fk_type')->unsigned();
            $table->timestamps();
        });

        Schema::table('items', function (Blueprint $table) {
            $table->foreign('fk_type', 'fk_type_items')->references('id')->on('item_types')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
