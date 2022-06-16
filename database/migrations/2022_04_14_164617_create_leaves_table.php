<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->string('e_id');
            $table->string('name');
            $table->string('email');
            $table->string('leave_type_name');
            $table->string('start_date');
            $table->string('end_date');
            $table->integer('days');
            $table->string('reason')->nullable();
            $table->string('feedback')->nullable();
            $table->string('status')->default('Hold');
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
        Schema::dropIfExists('leaves');
    }
}
