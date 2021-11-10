<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $tade->foreignId('time_tables_Id');
            $table->string('name');
            $table->boolean('is_in_use')->default(FALSE);
            $table->string('course_id')->nullable();
            $table->string('lecturer_id')->nullable();
            $table->string('day')->nullable();
            $table->string('start')->nullable();
            $table->string('stop')->nullable();
            $table->boolean('is_active')->default('true');
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
        Schema::dropIfExists('venues');
    }
}
