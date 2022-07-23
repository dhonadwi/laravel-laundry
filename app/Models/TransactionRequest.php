<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class TransactionRequest extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->code_transaction = IdGenerator::generate([
                'table' => 'transaction_requests',
                'field' => 'code_transaction',
                'length' => 11,
                'prefix' => 'Req-' . date('ym')
            ]);
        });
    }

    public function details()
    {
        return $this->hasMany(TransactionRequestDetail::class, 'transaction_id', 'id');
    }
}
