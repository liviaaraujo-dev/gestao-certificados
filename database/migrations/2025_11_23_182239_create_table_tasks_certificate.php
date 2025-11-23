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
        Schema::create('tasks_certificate', function (Blueprint $table) {
            $table->foreignId('task_id')
                ->constrained('tasks')
                ->onDelete('cascade');

            $table->foreignId('certificate_id')
                ->constrained('certificates')
                ->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();

            $table->primary(['task_id', 'certificate_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks_certificate');
    }
};
