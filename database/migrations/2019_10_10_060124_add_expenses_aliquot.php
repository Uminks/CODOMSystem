<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExpensesAliquot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aliquot', function (Blueprint $table) {
            $table->unsignedBigInteger('id_expenses');
            $table->unsignedBigInteger('id_estate');
            $table->foreign('id_expenses')->references('id')->on('expenses');
            $table->foreign('id_estate')->references('id')->on('estate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aliquot', function (Blueprint $table) {
            $table->dropForeign('aliquot_id_expenses_foreign');
            $table->dropForeign('aliquot_id_estate_foreign');
            $table->dropColumn('id_expenses');
            $table->dropColumn('id_estate');
        });
        
    }
}
