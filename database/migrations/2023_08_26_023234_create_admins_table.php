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
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('role_as');
            $table->integer('company_code');
            $table->boolean('remember_token')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::table('admins')->insert([
            "username" => 'abdo22',
            "email" => 'admin@admin',
            "password" => bcrypt('10123'),
            "company_code" => 1,
            "role_as" => 0,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
