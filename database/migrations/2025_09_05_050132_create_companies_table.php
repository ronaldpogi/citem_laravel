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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_address_line');
            $table->string('company_year_strablished')->nullable();
            $table->string('company_site')->nullable();
            $table->string('company_brochure')->nullable();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('country_id')->constrained();
            $table->foreignId('region_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
