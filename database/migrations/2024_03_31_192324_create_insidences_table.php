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
        Schema::create('insidences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('CategoryId')->nullable();
            $table->foreign('CategoryId')->references('id')->on('Category')->onDelete('set null');
            $table->unsignedBigInteger('TypeOfInsidenceId')->nullable();
            $table->foreign('TypeOfInsidenceId')->references('id')->on('TypeOfInsidence')->onDelete('set null');
            $table->unsignedBigInteger('AreaId')->nullable();
            $table->foreign('AreaId')->references('id')->on('Area')->onDelete('set null');
            $table->string('ReporterName',80);
            $table->string('VenueSpecific');
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
        Schema::dropIfExists('_insidences');
    }
};
