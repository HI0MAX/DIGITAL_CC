<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataCopy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_copy', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('user');
            $table->text('email');
            $table->string('paper_size'); // VARCHAR is not needed; string defaults to VARCHAR
            $table->string('color_settings');
            $table->integer('number_copies'); // Using integer instead of NUMBER
            $table->string('print_quality');
            $table->text('file');
            
            // Add more columns as needed
            $table->timestamps(); // Created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_copy');
    }
}
