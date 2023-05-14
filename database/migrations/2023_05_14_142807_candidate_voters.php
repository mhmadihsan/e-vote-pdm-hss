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
        Schema::create('candidate_voters', function (Blueprint $table) {
            $table->unsignedBigInteger('voters_id');
            $table->unsignedBigInteger('candidate_id')->nullable();
            $table->primary(['voters_id','candidate_id']);
//            $table->id();
//            $table->timestamps();
            $table->foreign('voters_id')->references('id')
                ->on('voters')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('candidate_id')->references('id')
                ->on('candidate')->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_voters');
    }
};
