<?php

namespace App\Models;

use App\Enums\OperationTypes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';

    protected $appends = ['operation_type_name'];
    protected $fillable = [
        'document_id',
        'process_id',
        'commit_id',
        'document_box',
        'document_date',
        'digitalization_date',
        'payment_date',
        'financial_year',
        'reference_month',
        'payment_billing',
        'operation_type',
        'description',
        'instituition_id',
        'creditor_id',
    ];

    protected function casts()
    {
        return [
            'document_date' => 'datetime:d/m/Y',
            'digitalization_date' => 'datetime:d/m/Y',
            'payment_date' => 'datetime:d/m/Y',
            'created_at' => 'datetime:d/m/Y',
            'updated_at' => 'datetime:d/m/Y'
        ];
    }

    public function operationTypeName() : Attribute
    {
        return Attribute::make(
            get: fn ($_, $attributes) => match($attributes['operation_type']) {
                OperationTypes::PAYMENT_OPERATION->value => 'pagamento',
                default => 'desconhecido'
            },
        );
    }

    public function instituition() 
    {
        return $this->belongsTo(Instituition::class);
    }

    public function creditor()
    {
        return $this->belongsTo(Creditor::class);
    }
}
