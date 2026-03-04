<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('walikelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kelas')->unique();
            $table->timestamps();
        });

        // Tambahkan kolom walikelas_id ke tabel siswas
        Schema::table('siswas', function (Blueprint $table) {
            $table->foreignId('walikelas_id')->nullable()->constrained('walikelas')->onDelete('set null');
        });
    }

    public function down(): void
    {
        // Hapus foreign key dan kolom walikelas_id dari siswas
        Schema::table('siswas', function (Blueprint $table) {
            if (Schema::hasColumn('siswas', 'walikelas_id')) {
                $table->dropForeign(['walikelas_id']);
                $table->dropColumn('walikelas_id');
            }
        });

        Schema::dropIfExists('walikelas');
    }
};
