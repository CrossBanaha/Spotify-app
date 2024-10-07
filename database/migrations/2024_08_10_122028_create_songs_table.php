<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Author;
use App\Models\Genre;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title',30);
            $table->string('url')->nullable();
            $table->string('description',60)->nullable();
            $table->date('premiere');
            $table->time('duration',2);
            $table->foreignIdFor(Author::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('songs');
    }
};