<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;


    protected $fillable = [
        'employee_id',
        'prize_id',
        'won_at',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


    public function prize()
    {
        return $this->belongsTo(Prize::class);
    }
}
