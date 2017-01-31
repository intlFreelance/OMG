<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function(Blueprint $table){
            $table->renameColumn('name','firstName');
            $table->string('lastName');
            $table->string('jobTitle');
            $table->renameColumn('phoneNumber', 'mainPhone');
            $table->string('workPhone')->nullable();
            $table->string('cellPhone')->nullable();
            $table->tinyInteger('isSecondary')->default(0);
            $table->dropForeign('contacts_account_id_foreign');
            $table->integer('account_id')->unsigned()->change();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function(Blueprint $table){
            $table->renameColumn('firstName', 'name');
            $table->renameColumn('mainPhone', 'phoneNumber');
            $table->dropColumn(['lastName', 'jobTitle', 'workPhone', 'cellPhone', 'isSecondary']);
            $table->dropForeign('contacts_account_id_foreign');
            $table->integer('account_id')->unsigned()->nullable()->change();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('set null');
        });
    }
}
