<?php

use App\Models\Role;
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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->timestamps();
        });

        Role::insert([
            [
                'slug' => 'lang',
                'title' => 'Language'
            ],
            [
                'slug' => 'api',
                'title' => 'API'
            ],
            [
                'slug' => 'admins',
                'title' => 'Admins'
            ],
            [
                'slug' => 'subscribers',
                'title' => 'Subscribers'
            ],
            [
                'slug' => 'pages',
                'title' => 'Pages'
            ],
            [
                'slug' => 'page-templates',
                'title' => 'Page-Templates'
            ],
            [
                'slug' => 'menu',
                'title' => 'Menu'
            ],
            [
                'slug' => 'menu-templates',
                'title' => 'Menu-Templates'
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
