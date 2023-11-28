<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota', function (Blueprint $table) {
            $table->string('KodeNota')->primary();
            $table->string('KodeTenan');
            $table->string('KodeKasir');
            $table->dateTime('TglNota');
            $table->time('JamNota');
            $table->decimal('JumlahBelanja', 10, 2);
            $table->decimal('Diskon', 10, 2);
            $table->decimal('Total', 10, 2);
            // Tambahkan kolom lainnya sesuai kebutuhan
            $table->timestamps();

            // Foreign keys
            $table->foreign('KodeTenan')->references('KodeTenan')->on('tenan');
            $table->foreign('KodeKasir')->references('KodeKasir')->on('kasir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota');
    }
};
