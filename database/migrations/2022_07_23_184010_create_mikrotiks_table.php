<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\mikrotik;

class CreateMikrotiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mikrotiks', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->string('username');
            $table->string('password');
            $table->timestamps();
        });


        mikrotik::create([
            'ip'=>'172.0.0.1',
            'username'=>'admin',
            'password'=>'',
        ]);
    }

    

    public function down()
    {
        Schema::dropIfExists('mikrotiks');
    }
}
