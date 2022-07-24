<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->code = IdGenerator::generate([
                'table' => 'transactions',
                'field' => 'code',
                'length' => 11,
                'prefix' => 'UCA-' . date('ym')
            ]);
        });
    }

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }
}
