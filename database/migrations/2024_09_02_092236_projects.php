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
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Project title
            $table->text('summary')->nullable(); // Short summary of the project
            $table->longText('description'); // Detailed description of the project
            $table->enum('status', ['draft', 'ongoing', 'completed'])->default('draft'); // Project status
            $table->timestamps(); // Created and updated timestamps
            $table->timestamp('published_at')->nullable(); // When the project started
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
