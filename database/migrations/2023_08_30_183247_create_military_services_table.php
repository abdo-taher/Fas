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
        Schema::create('military_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->tinyInteger('active')->default(1);
            $table->integer('added_by');
            $table->integer('updated_by')->nullable();
            $table->integer('com_code');
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::table('military_services')->insert([
           [
               'name' => 'ادي الخدمة العسكرية',
               'active' => '1',
               'added_by' => '1',
               'com_code' => '1',
           ] ,
            [
                'name' => 'اعفاء',
                'active' => '1',
                'added_by' => '1',
                'com_code' => '1',
            ] ,
            [
                'name' => 'مؤجل',
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
        Schema::dropIfExists('military_services');
    }
};
