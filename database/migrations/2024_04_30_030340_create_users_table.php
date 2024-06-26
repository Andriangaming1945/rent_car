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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->timestamp('username_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'user'])->default('admin');
            $table->string("noktp")->nullable();
            $table->string("nama")->nullable();
            $table->date("tgl_lahir")->nullable();
            $table->string("email")->nullable();
            $table->string("notelp")->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
