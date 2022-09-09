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
            $table->enum('side_dominance', ['left', 'right'])->nullable();
            $table->enum('sex', ['male', 'famle'])->nullable();
            $table->string('treatments')->nullable();
            $table->string('symptom')->nullable();
            $table->string('function')->nullable();
            $table->string('emotions_plan')->nullable();
            $table->string('connected_beliefs')->nullable();
            $table->string('meta_meaning')->nullable();
            $table->string('udin_moment')->nullable();
            $table->string('vakogs')->nullable();
            $table->string('symptoms')->nullable();
            $table->string('regeneration_trigger')->nullable();
            $table->string('regeneration_symptoms_a')->nullable();
            $table->string('healing_symptoms')->nullable();
            $table->string('regeneration_symptoms_b')->nullable();
            $table->string('meta_practice')->nullable();
            $table->string('action')->nullable();
            $table->string('follow_up')->nullable();
            $table->string('information')->nullable();
            $table->string('associations')->nullable();
            // $table->string('mobile')->nullable();
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
