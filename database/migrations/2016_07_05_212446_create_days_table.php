<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->increments('id');
            $table->date('day');
            $table->string('donor_name');
            $table->string('donor_email');
            $table->boolean('is_anonymous')->nullable();
            $table->string('stripe_charge_id');
            $table->string('stripe_customer_id')->nullable();
            $table->integer('amount');
            $table->text('source')->nullable();
            $table->string('description')->nullable();
            $table->text('metadata')->nullable();
            $table->boolean('captured')->nullable();
            $table->string('statement_descriptor')->nullable();
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
        Schema::drop('days');
    }
}
