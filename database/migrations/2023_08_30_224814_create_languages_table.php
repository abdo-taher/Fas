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
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->tinyInteger('active')->default(1);
            $table->integer('added_by');
            $table->integer('updated_by')->nullable();
            $table->integer('com_code');
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::table('languages')->insert([
            [
                'name' => 'العربية',
                'active' => '1',
                'added_by' => '1',
                'com_code' => '1',
            ]
            ,[
                'name' => 'الانجليزية',
                'active' => '1',
                'added_by' => '1',
                'com_code' => '1',
            ] ,
            [
                'name' => 'الفرنسية',
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
        Schema::dropIfExists('languages');
    }
};
