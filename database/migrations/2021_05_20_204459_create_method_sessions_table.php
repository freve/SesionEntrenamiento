<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMethodSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('method_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('method_id');
            $table->timestamps();

            $table->foreign('session_id', 'fk_sessions_method_sessions')->references('id')->on('sessions')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('method_id','fk_methods_method_sessions')->references('id')->on('methods')->cascadeOnUpdate()->restrictOnDelete();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('method_sessions');
    }
}
