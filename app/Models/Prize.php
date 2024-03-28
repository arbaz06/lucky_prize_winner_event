<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Prize extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Selects the next prize based on its probability
     *
     * @return Prize|null
     */
    public static function nextPrize()
    {
        $randomValue = rand(0, 100);
        $prize = Prize::where('probability', '>=', $randomValue)
                      ->orderBy('probability', 'asc')
                      ->first();

        return $prize;
    }
}
