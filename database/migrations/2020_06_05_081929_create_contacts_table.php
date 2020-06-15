<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->text('fullname');
            $table->text('poste')->nullable();
            $table->text('telephone')->nullable();
            $table->text('email')->nullable();
            $table->softDeletes();
            $table->unsignedBigInteger('clients_id');
            $table->foreign('clients_id')
                ->references('id')
                ->on('clients')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('contacts');
    }
}
