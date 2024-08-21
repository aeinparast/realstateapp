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
            $table->foreignIdFor(User::class)->nullable();
            $table->string('title')->nullable();
            $table->string('seller_name')->nullable();
            $table->string('seller_phone')->nullable()->default(null);
            $table->string('seller_mobile')->nullable();
            $table->string('city')->nullable()->default('');
            $table->text('notes')->nullable()->default('');
            $table->integer('type')->nullable()->default(0);
            $table->boolean('available')->nullable()->default(true);
            $table->integer('land_area')->nullable()->default(0);
            $table->integer('area')->nullable()->default(0);
            $table->integer('floors')->nullable()->default(0);
            $table->integer('floor')->nullable()->default(0);
            $table->string('img');
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
