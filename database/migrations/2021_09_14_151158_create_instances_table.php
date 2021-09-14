<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstancesTable extends Migration
{
    public function up()
    {
        Schema::create('instances', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('name');
            $table->timestamps();
        });
    }
}
