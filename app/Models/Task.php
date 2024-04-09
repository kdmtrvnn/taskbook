<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'status',
    ];

    const STATUS_NOT_URGENT = 1,
        STATUS_URGENT = 2,
        STATUS_NORMAL = 3,
        STATUS_VERY_URGENT = 4;

    public static $statuses = [
        self::STATUS_NOT_URGENT => 'Не срочная',
        self::STATUS_URGENT => 'Срочная',
        self::STATUS_NORMAL => 'Обычная',
        self::STATUS_VERY_URGENT => 'Очень срочная',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
