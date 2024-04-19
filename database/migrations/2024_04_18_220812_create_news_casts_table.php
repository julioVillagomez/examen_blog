<?php

use App\Models\Source;
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
        Schema::create('news_casts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('url');
            $table->string('url_to_image')->nullable();
            $table->dateTime('published_at');
            $table->longText('content');
            $table->string('slug');

            $table->foreignIdFor(Source::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_casts');
    }
};
