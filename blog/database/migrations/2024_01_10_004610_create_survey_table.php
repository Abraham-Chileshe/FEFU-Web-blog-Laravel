<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name',120);
            $table->string('email',120)->unique();
            $table->integer("age");
            $table->string('country');
            $table->string('rating');
            $table->string('visits');
            $table->text('news');
            $table->text('posts');
            $table->text('design');
            $table->text('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey');
    }
}
