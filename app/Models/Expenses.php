<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expenses extends Model
{
    protected $fillable= ['date', 'category_id','amount'];
    
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
