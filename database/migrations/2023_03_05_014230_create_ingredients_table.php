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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nome', 100);
            $table->text('description');
            $table->decimal('calorie', 6, 2);
            $table->decimal('carboidrati', 6, 2);
            $table->decimal('carboidrati_di_cui_zuccheri', 6, 2);
            $table->decimal('grassi', 6, 2);
            $table->decimal('grassi_di_cui_saturi', 6, 2);
            $table->decimal('fibre', 6, 2);
            $table->decimal('proteine', 6, 2);
            $table->decimal('sali', 6, 2);
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
