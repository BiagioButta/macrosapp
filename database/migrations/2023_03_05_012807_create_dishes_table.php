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
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nome', 100);
            $table->decimal('tot_calorie', 6, 2);
            $table->decimal('tot_carboidrati', 6, 2);
            $table->decimal('tot_carboidrati_di_cui_zuccheri', 6, 2);
            $table->decimal('tot_grassi', 6, 2);
            $table->decimal('tot_grassi_di_cui_saturi', 6, 2);
            $table->decimal('tot_fibre', 6, 2);
            $table->decimal('tot_proteine', 6, 2);
            $table->decimal('tot_sali', 6, 2);
            $table->enum('category', ['Colazione', 'pranzo', 'cena', 'merenda']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
