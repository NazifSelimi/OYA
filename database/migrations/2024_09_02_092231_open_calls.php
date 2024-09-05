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
        Schema::create('open_calls', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Title of the open call
            $table->text('summary')->nullable(); // Short excerpt or summary
            $table->longText('description'); // Detailed content of the open call
            $table->enum('status', ['draft', 'published'])->default('draft'); // Status of the open call
            $table->dateTime('published_at')->nullable();
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {


    }
};
