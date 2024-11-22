<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('guarantees', function (Blueprint $table) {
            $table->id();
            $table->string('corporate_reference_number')->unique(); // Unique reference number
            $table->string('guarantee_type'); // Bank, Bid Bond, Insurance, Surety
            $table->decimal('nominal_amount', 15, 2); // Nominal amount
            $table->string('nominal_amount_currency'); // Currency (e.g., USD, EUR)
            $table->date('expiry_date'); // Expiry date (must be a future date)
            $table->string('applicant_name');
            $table->text('applicant_address');
            $table->string('beneficiary_name');
            $table->text('beneficiary_address');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('guarantees');
    }
    
};
