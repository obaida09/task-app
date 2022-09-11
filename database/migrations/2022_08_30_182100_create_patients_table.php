<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('age');
            $table->string('mobile');
            $table->string('address');
            $table->enum('side_dominance', ['left', 'right']);
            $table->enum('sex', ['male', 'famle']);
            $table->string('patient_debts')             ->default('0')->nullable();
            $table->string('treatments')                ->nullable();
            $table->string('symptom')                   ->nullable();
            $table->string('function')                  ->nullable();
            $table->string('emotions_plan')             ->nullable();
            $table->string('connected_beliefs')         ->nullable();
            $table->string('meta_meaning')              ->nullable();
            $table->string('udin_moment')               ->nullable();
            $table->string('vakogs')                    ->nullable();
            $table->string('symptoms')                  ->nullable();
            $table->string('regeneration_trigger')      ->nullable();
            $table->string('regeneration_symptoms_a')   ->nullable();
            $table->string('healing_symptoms')          ->nullable();
            $table->string('regeneration_symptoms_b')   ->nullable();
            $table->string('meta_practice')             ->nullable();
            $table->string('action')                    ->nullable();
            $table->string('follow_up')                 ->nullable();
            $table->string('information')               ->nullable();
            $table->string('associations')              ->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('patients');
    }
}
