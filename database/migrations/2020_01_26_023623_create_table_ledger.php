<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLedger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledger', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('receipt');
            $table->enum('trans_type', ['bill', 'payment']);
            $table->string('valuation_code');
            $table->decimal('debit',12,4);
            $table->decimal('credit',12,4);
            $table->enum('revenue_type', ['BOP', 'PROPERTY-RATE','MARKET-TOLL']);
            $table->string('house_number');
            $table->string('date');
            $table->string('user_id');
            $table->year('year');
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
        Schema::dropIfExists('ledger');
    }
}
