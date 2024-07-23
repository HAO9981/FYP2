<?php

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
    Schema::table('tables', function (Blueprint $table) {
        if (!Schema::hasColumn('tables', 'image')) {
            $table->string('image')->nullable();
        }
    });
}


public function down()
{
    Schema::table('tables', function (Blueprint $table) {
        $table->dropColumn('image');
    });
}
};
