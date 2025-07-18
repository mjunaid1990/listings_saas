<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->foreignId('property_type_id')->constrained()->onDelete('cascade');
            $table->string('property_status')->default('for_sale');
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->decimal('square_feet', 10, 2)->nullable();
            $table->decimal('lot_size', 10, 2)->nullable();
            $table->integer('year_built')->nullable();
            $table->string('currency', 3)->default('USD');
            $table->decimal('hoa_fees', 10, 2)->nullable();
            $table->decimal('property_taxes', 10, 2)->nullable();
            $table->integer('stories')->nullable();
            $table->boolean('has_basement')->default(false);
            $table->integer('garage_spaces')->nullable();
            $table->string('heating_type')->nullable();
            $table->string('cooling_type')->nullable();
            $table->string('roof_type')->nullable();
            $table->string('flooring_type')->nullable();
            $table->string('exterior_material')->nullable();
            $table->boolean('has_pool')->default(false);
            $table->boolean('has_fireplace')->default(false);
            $table->string('energy_efficiency_rating')->nullable();
            $table->boolean('is_smart_home')->default(false);
            $table->json('additional_features')->nullable();
            $table->json('rental_terms')->nullable();
            $table->json('legal_documents')->nullable();
            $table->json('virtual_tour')->nullable();
            $table->json('floor_plans')->nullable();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn([
                'property_type_id', 'property_status', 'bedrooms', 'bathrooms',
                'square_feet', 'lot_size', 'year_built', 'currency', 'hoa_fees',
                'property_taxes', 'stories', 'has_basement', 'garage_spaces',
                'heating_type', 'cooling_type', 'roof_type', 'flooring_type',
                'exterior_material', 'has_pool', 'has_fireplace',
                'energy_efficiency_rating', 'is_smart_home', 'additional_features',
                'rental_terms', 'legal_documents', 'virtual_tour', 'floor_plans'
            ]);
        });
    }
};
