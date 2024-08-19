<?php

use App\Models\User;
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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('name');
            $table->text('bdoy');
            $table->integer('type')->default(0);
            $table->boolean('available')->default(true);
            $table->integer('land_area')->nullable()->default(null);
            $table->integer('area')->nullable()->default(null);
            $table->integer('floors')->nullable()->default(0);
            $table->integer('floor')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
