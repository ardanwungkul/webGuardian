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
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string('nama_domain');
            $table->string('report')->nullable();
            $table->string('catatan')->nullable();
            $table->enum('status_keterangan', ['Running', 'Done'])->default('Running');
            $table->enum('status_sitemap', ['Undone', 'Done'])->default('Undone');
            $table->enum('status_nerd', ['UnDone', 'Done'])->default('Undone');
            $table->enum('status_artikel_unik', ['aktif', 'nonaktif', 'disabled'])->default('nonaktif');
            $table->enum('status_backlink', ['aktif', 'nonaktif', 'disabled'])->default('nonaktif');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
            $table->boolean('internalReport')->default(false);
            $table->string('slug');
            $table->date('status_nerd_update')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};
