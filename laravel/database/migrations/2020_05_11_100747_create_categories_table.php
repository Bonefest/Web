<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->char('name', 128);
            $table->timestamps();
        });

        DB::table('categories')->insert(
            array(
                'id' => 1,
                'name' => 'sword',
            )
        );
        DB::table('categories')->insert(
            array(
                'id' => 2,
                'name' => 'mace',
            )
        );
        DB::table('categories')->insert(
            array(
                'id' => 3,
                'name' => 'axe',
            )
        );
        DB::table('categories')->insert(
            array(
                'id' => 4,
                'name' => 'staff',
            )
        );
        DB::table('categories')->insert(
            array(
                'id' => 5,
                'name' => 'wand',
            )
        );
        DB::table('categories')->insert(
            array(
                'id' => 6,
                'name' => 'blade',
            )
        );

        DB::table('categories')->insert(
            array(
                'id' => 7,
                'name' => 'one-handed',
            )
        );
        DB::table('categories')->insert(
            array(
                'id' => 8,
                'name' => 'two-handed',
            )
        );

        DB::table('categories')->insert(
            array(
                'id' => 9,
                'name' => 'throwable',
            )
        );
        DB::table('categories')->insert(
            array(
                'id' => 10,
                'name' => 'quest_item',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
