<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coins', function (Blueprint $table) {
            $table->id();
            $table->string('symbol')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('name')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->json('platform')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');


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
        Schema::dropIfExists('coins');
    }
}
