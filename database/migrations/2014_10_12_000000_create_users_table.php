<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('age');
            $table->string('session_price');
            $table->enum('side_dominance', ['left', 'right']);
            $table->enum('sex', ['male', 'famle']);
            $table->string('treatments');
            $table->string('symptom');
            $table->string('function');
            $table->string('emotions_plan');
            $table->string('connected_beliefs');
            $table->string('meta_meaning');
            $table->string('udin_moment');
            $table->string('vakogs');
            $table->string('symptoms');
            $table->string('regeneration_trigger');
            $table->string('regeneration_symptoms_a');
            $table->string('healing_symptoms');
            $table->string('regeneration_symptoms_b');
            $table->string('meta_practice');
            $table->string('action');
            $table->string('follow_up');
            $table->string('information');
            $table->string('associations');
            $table->string('mobile');
            // $table->string('academic_achievement')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
