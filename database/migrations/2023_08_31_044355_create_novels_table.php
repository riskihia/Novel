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
        Schema::create('novels', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->nullable("false");
            $table->string('judul')->require()->unique();
            $table->string('link')->require();
            $table->text('sinopsis')->required()->nullable(false);
            $table->enum('status', ['completed', 'hiatus', 'ongoing'])->default('ongoing');
            $table->string('author_name')->nullable(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('novels');
    }
};
