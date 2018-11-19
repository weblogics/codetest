<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->increments('package_id');
            $table->string('name', 180)->default('');
            $table->string('description', 220)->default('');
            $table->enum('desk_type', ['flexi', 'unlimited', 'dedicated', 'office'])->default('flexi');
            $table->unsignedInteger('cancellation_period')->default(0);
            $table->unsignedInteger('commitment_period')->default(0);
            $table->float('price', 10, 2)->default(0.20);
            $table->unsignedInteger('mr_credits')->default(0);
            $table->unsignedInteger('days')->default(10);
            $table->unsignedInteger('sell_limit')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
