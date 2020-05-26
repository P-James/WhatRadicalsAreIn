<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radicals', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('radical_number');
            $table->text('radical');
            $table->text('english');
            $table->text('pinyin');
            $table->text('stroke_count');
            $table->text('variants');
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
        Schema::dropIfExists('radicals');
    }
}
