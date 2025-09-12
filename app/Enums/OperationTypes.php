<?php

namespace App\Enums;

enum OperationTypes : int
{
    case PAYMENT_OPERATION = 1;
    
    public static function getOperationByName($operationName)
    {
        return match ($operationName) {
            'pagamento' => OperationTypes::PAYMENT_OPERATION->value,
        };
    }
}
