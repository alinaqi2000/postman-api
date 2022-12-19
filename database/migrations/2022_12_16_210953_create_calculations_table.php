<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId("user_id")->constrained("users")->cascadeOnUpdate()->cascadeOnDelete();

            $table->enum("type", ['sum', 'diff', 'product', 'division', 'mean'])->default("sum");
            $table->double("number1");
            $table->double("number2");

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
        Schema::dropIfExists('calculations');
    }
};