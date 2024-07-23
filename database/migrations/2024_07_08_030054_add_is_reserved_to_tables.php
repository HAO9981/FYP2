<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsReservedToTables extends Migration
{
    public function up()
    {
        Schema::table('tables', function (Blueprint $table) {
            $table->boolean('is_reserved')->default(false);
        });
    }

    public function down()
    {
        Schema::table('tables', function (Blueprint $table) {
            $table->dropColumn('is_reserved');
        });
    }
}
