<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'deputy_id',
        'supplier_cpfcnpj',
        'refund_number',
        'expense_type',
        'doc_type',
        'doc_date',
        'doc_number',
        'url_doc',
        'supplier_name',
        'doc_code',
        'code_doc_type',
        'year',
        'month',
        'cod_batch',
        'parcel',
        'doc_value',
        'net_value',
        'gloss_value'
    ];
}
