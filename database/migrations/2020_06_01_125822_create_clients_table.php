<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id(); // id
            $table->text('enseigne');// enseigne
            $table->text('note')->nullable();// note
            $table->integer('telephone')->nullable();// téléphone (nullable)
            $table->string('email')->nullable();// email (nullable)
            $table->string('ville');// ville
            $table->integer('cp');// ville
            $table->boolean('etat')->default(0); // 0 = prospect, 1 = client
            $table->text('picture')->nullable(); // logo
            $table->softDeletes();
            $table->timestamps(); // created_at/update_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artists');
    }
}
