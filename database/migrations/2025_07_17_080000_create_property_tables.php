<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Create property_types table if it doesn't exist
        if (!Schema::hasTable('property_types')) {
            Schema::create('property_types', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->text('description')->nullable();
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        // Create property_features table if it doesn't exist
        if (!Schema::hasTable('property_features')) {
            Schema::create('property_features', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('category'); // e.g., 'interior', 'exterior', 'amenities'
                $table->string('slug')->unique();
                $table->text('description')->nullable();
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        // Create property_feature_pivot table if it doesn't exist
        if (!Schema::hasTable('property_feature_pivot')) {
            Schema::create('property_feature_pivot', function (Blueprint $table) {
                $table->id();
                $table->foreignId('property_id')->constrained()->onDelete('cascade');
                $table->foreignId('property_feature_id')->constrained()->onDelete('cascade');
                $table->timestamps();
            });
        }

        // Create property_amenities table if it doesn't exist
        if (!Schema::hasTable('property_amenities')) {
            Schema::create('property_amenities', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('category'); // e.g., 'kitchen', 'bathroom', 'outdoor'
                $table->string('slug')->unique();
                $table->text('description')->nullable();
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        // Create property_amenity_pivot table if it doesn't exist
        if (!Schema::hasTable('property_amenity_pivot')) {
            Schema::create('property_amenity_pivot', function (Blueprint $table) {
                $table->id();
                $table->foreignId('property_id')->constrained()->onDelete('cascade');
                $table->foreignId('property_amenity_id')->constrained()->onDelete('cascade');
                $table->timestamps();
            });
        }

        // Update properties table
        Schema::table('properties', function (Blueprint $table) {
            if (!Schema::hasColumn('properties', 'property_type_id')) {
                $table->foreignId('property_type_id')->constrained()->onDelete('cascade');
            }
            if (!Schema::hasColumn('properties', 'property_status')) {
                $table->string('property_status')->default('for_sale');
            }
            if (!Schema::hasColumn('properties', 'bedrooms')) {
                $table->integer('bedrooms')->nullable();
            }
            if (!Schema::hasColumn('properties', 'bathrooms')) {
                $table->integer('bathrooms')->nullable();
            }
            if (!Schema::hasColumn('properties', 'square_feet')) {
                $table->decimal('square_feet', 10, 2)->nullable();
            }
            if (!Schema::hasColumn('properties', 'lot_size')) {
                $table->decimal('lot_size', 10, 2)->nullable();
            }
            if (!Schema::hasColumn('properties', 'year_built')) {
                $table->integer('year_built')->nullable();
            }
            if (!Schema::hasColumn('properties', 'currency')) {
                $table->string('currency', 3)->default('USD');
            }
            if (!Schema::hasColumn('properties', 'hoa_fees')) {
                $table->decimal('hoa_fees', 10, 2)->nullable();
            }
            if (!Schema::hasColumn('properties', 'property_taxes')) {
                $table->decimal('property_taxes', 10, 2)->nullable();
            }
            if (!Schema::hasColumn('properties', 'stories')) {
                $table->integer('stories')->nullable();
            }
            if (!Schema::hasColumn('properties', 'has_basement')) {
                $table->boolean('has_basement')->default(false);
            }
            if (!Schema::hasColumn('properties', 'garage_spaces')) {
                $table->integer('garage_spaces')->nullable();
            }
            if (!Schema::hasColumn('properties', 'heating_type')) {
                $table->string('heating_type')->nullable();
            }
            if (!Schema::hasColumn('properties', 'cooling_type')) {
                $table->string('cooling_type')->nullable();
            }
            if (!Schema::hasColumn('properties', 'roof_type')) {
                $table->string('roof_type')->nullable();
            }
            if (!Schema::hasColumn('properties', 'flooring_type')) {
                $table->string('flooring_type')->nullable();
            }
            if (!Schema::hasColumn('properties', 'exterior_material')) {
                $table->string('exterior_material')->nullable();
            }
            if (!Schema::hasColumn('properties', 'has_pool')) {
                $table->boolean('has_pool')->default(false);
            }
            if (!Schema::hasColumn('properties', 'has_fireplace')) {
                $table->boolean('has_fireplace')->default(false);
            }
            if (!Schema::hasColumn('properties', 'energy_efficiency_rating')) {
                $table->string('energy_efficiency_rating')->nullable();
            }
            if (!Schema::hasColumn('properties', 'is_smart_home')) {
                $table->boolean('is_smart_home')->default(false);
            }
            if (!Schema::hasColumn('properties', 'additional_features')) {
                $table->json('additional_features')->nullable();
            }
            if (!Schema::hasColumn('properties', 'rental_terms')) {
                $table->json('rental_terms')->nullable();
            }
            if (!Schema::hasColumn('properties', 'legal_documents')) {
                $table->json('legal_documents')->nullable();
            }
            if (!Schema::hasColumn('properties', 'virtual_tour')) {
                $table->json('virtual_tour')->nullable();
            }
            if (!Schema::hasColumn('properties', 'floor_plans')) {
                $table->json('floor_plans')->nullable();
            }
            if (!Schema::hasColumn('properties', 'deleted_at')) {
                $table->softDeletes();
            }
            if (!Schema::hasColumn('properties', 'seo_title')) {
                $table->string('seo_title')->nullable();
            }
            if (!Schema::hasColumn('properties', 'seo_description')) {
                $table->text('seo_description')->nullable();
            }
            if (!Schema::hasColumn('properties', 'seo_keywords')) {
                $table->string('seo_keywords')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::dropIfExists('property_feature_pivot');
        Schema::dropIfExists('property_amenity_pivot');
        Schema::dropIfExists('property_features');
        Schema::dropIfExists('property_amenities');
        Schema::dropIfExists('property_types');
        Schema::dropIfExists('properties');
    }
};
