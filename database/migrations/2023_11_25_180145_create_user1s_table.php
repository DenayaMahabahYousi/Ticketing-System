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
        Schema::create('user1', function (Blueprint $table) {
            $table->id();
            $table->timestamp('opened_at');
            $table->timestamp('process_at')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->longText('complaint');
            $table->longText('answer')->nullable();
            $table->string('name');
            $table->foreignId('admin_id')->nullable()->references('id')->on('admins');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->foreignId('status_id')->references('id')->on('statuses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user1');
    }
};
