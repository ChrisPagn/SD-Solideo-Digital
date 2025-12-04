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
        // Blog Posts indexes
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->index('is_published');
            $table->index('published_at');
            $table->index('category');
            $table->index(['is_published', 'published_at'], 'idx_blog_published_date');
        });

        // Projects indexes
        Schema::table('projects', function (Blueprint $table) {
            $table->index('category');
            $table->index('is_active');
            $table->index('is_featured');
            $table->index(['is_active', 'is_featured', 'completed_at'], 'idx_project_active_featured');
        });

        // Services indexes
        Schema::table('services', function (Blueprint $table) {
            $table->index('is_active');
            $table->index('order');
            $table->index(['is_active', 'order'], 'idx_service_active_order');
        });

        // Testimonials indexes
        Schema::table('testimonials', function (Blueprint $table) {
            $table->index('is_active');
            $table->index('is_featured');
            $table->index('rating');
            $table->index('project_type');
            $table->index(['is_active', 'is_featured', 'created_at'], 'idx_testimonial_active_featured');
        });

        // Appointments indexes
        Schema::table('appointments', function (Blueprint $table) {
            $table->index('status');
            $table->index('preferred_date');
            $table->index(['status', 'preferred_date'], 'idx_appointment_status_date');
        });

        // Contacts indexes
        Schema::table('contacts', function (Blueprint $table) {
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropIndex(['is_published']);
            $table->dropIndex(['published_at']);
            $table->dropIndex(['category']);
            $table->dropIndex('idx_blog_published_date');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropIndex(['category']);
            $table->dropIndex(['is_active']);
            $table->dropIndex(['is_featured']);
            $table->dropIndex('idx_project_active_featured');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropIndex(['is_active']);
            $table->dropIndex(['order']);
            $table->dropIndex('idx_service_active_order');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropIndex(['is_active']);
            $table->dropIndex(['is_featured']);
            $table->dropIndex(['rating']);
            $table->dropIndex(['project_type']);
            $table->dropIndex('idx_testimonial_active_featured');
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['preferred_date']);
            $table->dropIndex('idx_appointment_status_date');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['created_at']);
        });
    }
};
