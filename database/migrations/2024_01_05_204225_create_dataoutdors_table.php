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
        Schema::create('dataoutdors', function (Blueprint $table) {
            $table->id();
            $table->float('suhu_out');
            $table->float('kelembaban_out');
            $table->string('hujan');
            $table->string('kond_cahaya');
            $table->float('intens_cahaya');
            $table->string('hari');
            $table->string('datetime');
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
        Schema::dropIfExists('dataoutdors');
    }
};
