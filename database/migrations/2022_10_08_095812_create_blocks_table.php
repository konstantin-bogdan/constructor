<?php

use App\Models\Block;
use App\Models\Page;
use App\Models\Template;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->json('options')->nullable();
            $table->boolean('show')->default(true);
            $table->smallInteger('number')->default(1);
            $table->foreignIdFor(Page::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Block::class)->nullable()->constrained()->onDelete('cascade');
            $table->foreignIdFor(Template::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blocks');
    }
};
