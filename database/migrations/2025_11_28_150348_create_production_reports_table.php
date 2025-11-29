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
        Schema::create('production_reports', function (Blueprint $table) {
            $table->id();
        
        // --- PASTIKAN BARIS INI ADA ---
        $table->foreignId('product_id')->constrained()->onDelete('cascade'); 
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        // ------------------------------

        $table->integer('quantity_result');
        $table->integer('quantity_reject')->default(0);
        $table->date('production_date');
        $table->text('notes')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_reports');
    }
};
