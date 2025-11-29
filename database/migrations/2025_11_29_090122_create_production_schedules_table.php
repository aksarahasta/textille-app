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
    Schema::create('production_schedules', function (Blueprint $table) {
        $table->id();
        $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Produk apa?
        $table->date('start_date');       // Mulai kapan?
        $table->date('end_date');         // Target selesai kapan?
        $table->integer('planned_quantity'); // Target jumlah
        // Status pengerjaan
        $table->enum('status', ['planned', 'running', 'completed', 'canceled'])->default('planned');
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_schedules');
    }
};
