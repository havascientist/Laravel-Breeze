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
        Schema::table('users', function (Blueprint $table) {
            // Penambahan kolom baru
            $table->string('username', 100);
            $table->string('address', 1000);
            $table->string('phoneNumber', 20)->nullable();
            $table->date('birthdate')->nullable();
            $table->tinyInteger('jenis_kelamin');
            $table->string('agama', 20);
            
            // Modifikasi kolom
            $table->renameColumn('name', 'fullname');
            // Pastikan kolom email dapat bernilai null
            $table->string('email')->nullable()->change();
        });
        
    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            
        });
    }
};
