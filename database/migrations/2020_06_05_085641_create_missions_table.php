<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->text('titre');
            $table->text('descriptif');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('ct_days');
            $table->integer('adr');
            $table->integer('etat')->default(0); // 0 = bientôt - 1 = en cours - 2 = terminé - 3 = annulé
            $table->unsignedBigInteger('clients_id');
            $table->foreign('clients_id')
                ->references('id')
                ->on('clients')
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
        Schema::dropIfExists('missions');
    }
}