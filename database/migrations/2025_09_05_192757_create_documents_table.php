<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('document_id');
            $table->bigInteger('process_id');
            $table->bigInteger('commit_id');
            $table->bigInteger('document_box');

            $table->date('document_date');
            $table->date('digitalization_date');
            $table->date('payment_date');

            $table->integer('financial_year');
            $table->integer('reference_month');
            $table->integer('payment_billing');

            $table->tinyInteger('operation_type');
            
            $table->text('description');

            $table->unsignedBigInteger('instituition_id');
            $table->unsignedBigInteger('creditor_id');

            $table->foreign('instituition_id')
                ->references('id')
                ->on('instituitions');
            $table->foreign('creditor_id')
                ->references('id')
                ->on('creditors');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
