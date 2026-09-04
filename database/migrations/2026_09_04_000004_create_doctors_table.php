<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->nullOnDelete();
            $table->string('name');
            $table->string('title'); // ví dụ: Bác sĩ Chuyên khoa II, Thạc sĩ Bác sĩ
            $table->string('specialization'); // Chỉnh nha Invisalign, Trồng răng Implant
            $table->integer('experience_years')->default(10);
            $table->string('avatar')->nullable();
            $table->text('bio')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
