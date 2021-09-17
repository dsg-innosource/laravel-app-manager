<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instance_id');
            $table->unsignedBigInteger('environment_id');
            $table->string('php_version')->nullable();
            $table->string('database_version')->nullable();
            $table->json('config')->nullable();
            $table->timestamps();
        });
    }
}
