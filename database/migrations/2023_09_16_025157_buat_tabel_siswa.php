<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Psy\Shell;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_siswa',function(Blueprint $table){
            $table->integer('nisn');
            $table->string('nama',30)->nullable;
            $table->string('alamat')->nullable;
            $table->string('no_telp',13);
            $table->string('kode_kelas',10);
            $table->timestamps();
            $table->primary('nisn');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('tb_siswa');      
    }
};
