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
    {  Schema::create('reparations', function (Blueprint $table) {
        $table->id();
        $table->text('description');
        $table->enum('status', ['en cours', 'en attente', 'terminer']);
        $table->date('startDate');
        $table->date('endDate');
        $table->string('mechanicNotes');
        $table->string('clientNotes');
        $table->unsignedBigInteger('mecanic_id');

        $table->foreign('mecanic_id')
            ->references('id')


            ->on('mecaniciens')
            ->onDelete('cascade');
                $table->unsignedBigInteger('vehicule_id')->nullable();
                $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');
                $table->timestamps();
                });
            }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparations');
    }
};
