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
        Schema::create('qualif_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('added_by');
            $table->integer('updated_by')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->integer('com_code');
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::table('qualif_types')->insert([
            [
                'name' => 'داكتوراه',
                'active' => '1',
                'added_by' => '1',
                'com_code' => '1',
            ] ,
            [
                'name' => 'ماجستير',
                'active' => '1',
                'added_by' => '1',
                'com_code' => '1',
            ] ,[
                'name' => 'بكالوريوس',
                'active' => '1',
                'added_by' => '1',
                'com_code' => '1',
            ],[
                'name' => 'ليسانس',
                'active' => '1',
                'added_by' => '1',
                'com_code' => '1',
            ],[
                'name' => 'فوق المتوسط (معهد)',
                'active' => '1',
                'added_by' => '1',
                'com_code' => '1',
            ],[
                'name' => 'ثانوية او مايعادلها',
                'active' => '1',
                'added_by' => '1',
                'com_code' => '1',
            ],[
                'name' => 'اعدادية',
                'active' => '1',
                'added_by' => '1',
                'com_code' => '1',
            ],[
                'name' => 'ابتدائي',
                'active' => '1',
                'added_by' => '1',
                'com_code' => '1',
            ],[
                'name' => 'لم يحصل علي شيئ',
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
        Schema::dropIfExists('qualif_types');
    }
};
