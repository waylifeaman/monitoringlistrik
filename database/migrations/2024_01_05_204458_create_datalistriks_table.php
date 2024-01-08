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
        Schema::create('datalistriks', function (Blueprint $table) {
            $table->id();
            $table->float('tegangan_1');
            $table->float('arus_1');
            $table->float('daya_1');
            $table->float('tegangan_2');
            $table->float('arus_2');
            $table->float('daya_2');
            $table->float('tegangan_3');
            $table->float('arus_3');
            $table->float('daya_3');
            $table->float('daya_total');
            $table->float('sisa_daya');
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
        Schema::dropIfExists('datalistriks');
    }
};
