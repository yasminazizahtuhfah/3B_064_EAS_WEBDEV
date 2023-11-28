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
        Schema::create('barang_nota', function (Blueprint $table) {
            $table->string('KodeNota');
            $table->string('KodeBarang');
            $table->integer('JumlahBarang');
            $table->decimal('HargaSatuan', 10, 2);
            $table->decimal('Jumlah', 10, 2);
            // Tambahkan kolom lainnya sesuai kebutuhan
            $table->timestamps();

            // Foreign keys
            $table->foreign('KodeNota')->references('KodeNota')->on('nota');
            $table->foreign('KodeBarang')->references('KodeBarang')->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_nota');
    }
};
