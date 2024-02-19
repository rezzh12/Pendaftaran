<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('email',50);
            $table->string('nama',50);
            $table->string('nama_panggilan',20);
            $table->string('jenis_kelamin',10);
            $table->string('tempat_lahir',20);
            $table->date('tanggal_lahir');
            $table->string('alamat',100);
            $table->string('asal_pesantren',50);
            $table->string('no_hp',15);
            $table->string('nama_wali',50);
            $table->string('no_hp_wali',15);
            $table->string('foto_santri',100);
            $table->string('foto_kk',100);
            $table->string('foto_ktp_wali',100);
            $table->string('kategori',20);
            $table->foreignId('tahun_pendaftaran_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftars');
    }
}
