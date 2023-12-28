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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('author', 64)->after('title');
            $table->string('hero_image')->nullable();
            $table->longText('body_1')->nullable();
            $table->string('image_2')->nullable();
            $table->longText('body_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('author');
            $table->dropColumn('hero_image');
            $table->dropColumn('body_1');
            $table->dropColumn('image_2');
            $table->dropColumn('body_2');
        });
    }
};
