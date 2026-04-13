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
    Schema::table('services', function (Blueprint $table) {
        $table->string('no_resi')->unique()->after('user_id');
        $table->string('nama_pelanggan')->after('no_resi');
        $table->string('no_hp')->after('nama_pelanggan');
        $table->string('jenis_perangkat')->after('no_hp');
        $table->text('keluhan')->after('jenis_perangkat');
        $table->string('status')->default('masuk')->after('keluhan');
    });
}

public function down(): void
{
    Schema::table('services', function (Blueprint $table) {
        $table->dropColumn(['no_resi', 'nama_pelanggan', 'no_hp', 'jenis_perangkat', 'keluhan', 'status']);
    });
}
};
