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
        Schema::create('reimbursements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('tanggal');
            $table->string('nama_reimburs');
            $table->integer('jumlah');
            $table->text('deskripsi');
            $table->string('file');
            $table->string('status')->default('Menunggu Konfirmasi');
            $table->string('dir_appr');
            $table->string('fin_appr');
            $table->integer('user_update');
            $table->integer('user_delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reimbursements');
    }
};
