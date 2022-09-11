<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_details', function (Blueprint $table) {
            $table->id();
            $table->longText('session_notes');
            $table->enum('marital_status', ['public', 'private'])->default('private');
            $table->boolean('accept')->default(false);
            $table->foreignId('session_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->timestamp('posted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('session_details');
    }
}
