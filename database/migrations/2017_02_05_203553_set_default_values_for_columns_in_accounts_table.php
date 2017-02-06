<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetDefaultValuesForColumnsInAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function(Blueprint $table){
            $table->text('dba')->nullable()->change();
            $table->text('billingAddress')->nullable()->change();
            $table->integer('primarySalesRep_id')->unsigned()->nullable()->change();
            $table->integer('secondarySalesRep_id')->unsigned()->nullable()->change();
        });
        Schema::table('account_shipping_addresses', function(Blueprint $table){
            $table->text('address')->nullable()->change();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function(Blueprint $table){
            $table->text('dba')->change();
            $table->text('billingAddress')->change();
            $table->integer('primarySalesRep_id')->unsigned()->change();
            $table->integer('secondarySalesRep_id')->unsigned()->change();
        });
        Schema::table('account_shipping_addresses', function(Blueprint $table){
            $table->text('address')->change();
        });
    }
}
