<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_choices', function (Blueprint $table) {
            $table->id("meal_choice_id");
            $table->foreignId("user_id")->constrained("users","user_id");
            $table->foreignId("option_id")->constrained("meal_options","meal_option_id");
            $table->date("date");
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
        Schema::dropIfExists('meal_choices');
    }
}
