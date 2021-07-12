<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountingPoliciesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounting_policies_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idAccountingPolicy')->constrained('accounting_policies');
            $table->dateTime('date_start');
            $table->integer('version');
            $table->boolean('published')->default(false);
            $table->text('text');
            $table->foreignId('idUserRev')->constrained('users');
            $table->foreignId('idUser')->constrained('users');
            $table->boolean('expired')->default(false);
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
        Schema::dropIfExists('accounting_policies_details');
    }
}
