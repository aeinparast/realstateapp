<?php

use App\Models\City;
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
            $table->foreignIdFor(City::class);
            $table->string('title'); // String for the title
            $table->unsignedTinyInteger('fileType')->default(0); // Integer with default value 0
            $table->unsignedTinyInteger('isPublic')->default(0); // Integer with default value 0
            $table->unsignedTinyInteger('assetType')->default(0)->index(); // Integer with default value 0
            $table->unsignedTinyInteger('dealType')->default(0)->index();  // Integer with default value 0
            $table->unsignedTinyInteger('buildingType')->default(0)->index();  // Integer with default value 0
            $table->unsignedBigInteger('price_private')->default(0); // Integer for price_private with default value
            $table->unsignedBigInteger('price_public')->default(0)->index();  // Integer for price_public with default value
            $table->unsignedInteger('rent')->nullable()->default(0);
            $table->unsignedBigInteger('price_per_meter')->default(0);  // Integer for price_public with default value
            $table->text('notes')->nullable();  // Text field for notes, nullable
            $table->string('seller_name');  // String for seller_name
            $table->string('seller_mobile')->nullable();  // String for seller_mobile
            $table->string('seller_phone')->nullable();  // String for seller_phone, nullable
            $table->string('map')->nullable()->default('');  // String for seller_phone, nullable
            $table->string('city')->nullable();  // String for city
            $table->json('facilities_list')->nullable();  // JSON for facilities_list, nullable
            $table->unsignedInteger('area')->nullable();  // Integer for area
            $table->unsignedInteger('space')->nullable();  // Integer for area
            $table->unsignedTinyInteger('floor')->nullable();  // Integer for floor
            $table->unsignedTinyInteger('direction')->nullable();  // Integer for direction
            $table->unsignedTinyInteger('beds')->nullable();  // Integer for beds
            $table->unsignedTinyInteger('wcs')->nullable();  // Integer for wc
            $table->unsignedTinyInteger('cooks')->nullable();  // Integer for cooks
            $table->unsignedTinyInteger('cooling')->nullable();  // Integer for cooling
            $table->unsignedTinyInteger('heating')->nullable();  // Integer for heating
            $table->unsignedTinyInteger('water')->nullable();  // Integer for water
            $table->unsignedTinyInteger('elec')->nullable();  // Integer for electricity
            $table->unsignedTinyInteger('gas')->nullable();  // Integer for gas
            $table->unsignedTinyInteger('landline')->nullable();  // Integer for landline
            $table->unsignedTinyInteger('elevator')->nullable();  // Integer for elevator
            $table->unsignedTinyInteger('storage')->nullable();  // Integer for floor
            $table->unsignedTinyInteger('parking')->nullable();  // Integer for floor
            $table->string('img')->nullable(); // String for Images
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
