<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('disabilities_processes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->tinyInteger('active')->default(1);
            $table->integer('added_by');
            $table->integer('updated_bu')->nullable();
            $table->integer('com_code');
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::table('disabilities_processes')->insert([
            [
                'name' => 'اعاقة بصرية',
                'active' => '1',
                'added_by' => '1',
                'com_code' => '1',
            ] ,
            [
                'name' => 'اعاقة حسية',
                'active' => '1',
                'added_by' => '1',
                'com_code' => '1',
            ] ,
            [
                'name' => 'اعاقة سمعية',
                'active' => '1',
                'added_by' => '1',
                'com_code' => '1',
            ],
            [
                'name' => 'اعاقة حركية',
                'active' => '1',
                'added_by' => '1',
                'com_code' => '1',
            ]

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disabilities_processes');
    }
};
