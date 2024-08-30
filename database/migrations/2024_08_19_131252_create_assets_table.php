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
            $table->string('title'); // String for the title
            $table->unsignedTinyInteger('assetType')->default(0)->index(); // Integer with default value 0
            $table->unsignedTinyInteger('dealType')->default(0)->index();  // Integer with default value 0
            $table->unsignedBigInteger('price_private')->default(0); // Integer for price_private with default value
            $table->unsignedBigInteger('price_public')->default(0)->index();  // Integer for price_public with default value
            $table->text('notes')->nullable();  // Text field for notes, nullable
            $table->string('seller_name');  // String for seller_name
            $table->string('seller_mobile')->nullable();;  // String for seller_mobile
            $table->string('seller_phone')->nullable();  // String for seller_phone, nullable
            $table->string('city');  // String for city
            $table->json('facilities_list')->nullable();  // JSON for facilities_list, nullable
            $table->unsignedInteger('area');  // Integer for area
            $table->unsignedTinyInteger('floor');  // Integer for floor
            $table->unsignedTinyInteger('direction');  // Integer for direction
            $table->unsignedTinyInteger('beds');  // Integer for beds
            $table->unsignedTinyInteger('wc');  // Integer for wc
            $table->unsignedTinyInteger('cooks');  // Integer for cooks
            $table->unsignedTinyInteger('cooling');  // Integer for cooling
            $table->unsignedTinyInteger('heating');  // Integer for heating
            $table->unsignedTinyInteger('water');  // Integer for water
            $table->unsignedTinyInteger('elec');  // Integer for electricity
            $table->unsignedTinyInteger('gas');  // Integer for gas
            $table->unsignedTinyInteger('landline');  // Integer for landline
            $table->string('img'); // String for Images
            $table->timestamps(); // Created at and updated at timestamps
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
