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
        Schema::create('shitfts_type', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('type')->comment('1صباحي 2مسائي');
            $table->time('from_time');
            $table->time('to_time');
            $table->decimal('total_hour',10,2);
            $table->integer('added_by');
            $table->integer('updated_by')->nullable();
            $table->integer('com_code');
            $table->integer('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shitfts_type');
    }
};
