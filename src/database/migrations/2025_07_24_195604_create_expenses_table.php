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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->integer('deputy_id');
            $table->string('supplier_cpfcnpj');
            $table->string('refund_number');
            $table->string('expense_type');
            $table->string('doc_type');
            $table->string('doc_date');
            $table->string('doc_number');
            $table->string('url_doc');
            $table->string('supplier_name');
            $table->integer('doc_code');
            $table->integer('code_doc_type');
            $table->integer('year');
            $table->integer('month');
            $table->integer('cod_batch');
            $table->integer('parcel');
            $table->float('doc_value');
            $table->float('net_value');
            $table->float('gloss_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
