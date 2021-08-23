<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public $timestamps = false;

    public function deposit(float $value) : Array
    {
        $this->amount += number_format($value, 2, '.', '');
        $deposit = $this->save();

        if($deposit)
        {
            return [
                'success' => true,
                'message' => 'Sucesso ao efetuar a recarrega'
            ];
        }

        return [
            'success' => false,
            'message' => 'Erro ao efetuar a recarrega'
        ];
    }
}