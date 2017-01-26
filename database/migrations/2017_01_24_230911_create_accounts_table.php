<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->text('dba');
            $table->string('taxID');
            $table->text('billingAddress');
            $table->tinyInteger('shippingAddressSameAsBilling')->default(0);
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->string('fax')->nullable();
            $table->string('website')->nullable();
            $table->text('notes')->nullable();
            $table->integer('primarySalesRep_id')->unsigned();
            $table->foreign('primarySalesRep_id')->references('id')->on('contacts');
            $table->integer('secondarySalesRep_id')->unsigned();
            $table->foreign('secondarySalesRep_id')->references('id')->on('contacts');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accounts');
    }
}