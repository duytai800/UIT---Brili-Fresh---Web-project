<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Product', function (Blueprint $table) {
            $table->bigIncrements('ProID');
            $table->string('ProName',100);
            $table->string('Price',100);
            $table->integer('TypeID');
            $table->string('Source',100);
            $table->date('StartDate');
            $table->string('Des',100);
            $table->string('Unit',100);
            $table->integer('IsDeleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Product');
    }
}
