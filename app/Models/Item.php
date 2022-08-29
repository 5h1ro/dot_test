<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public $incrementing = false;

    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value)->isoFormat('dddd, D MMMM Y');
        $time = Carbon::parse($value)->format('H:i');
        $data = $date . ' ' . $time;
        return $data;
    }

    public function getUpdatedAtAttribute($value)
    {
        $date = Carbon::parse($value)->isoFormat('dddd, D MMMM Y');
        $time = Carbon::parse($value)->format('H:i');
        $data = $date . ' ' . $time;
        return $data;
    }

    public function getTypeAttribute()
    {
        $data = ItemType::find($this->fk_type);
        return $data;
    }
    protected $appends = ['type'];

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'fk_type'
    ];

    public function type()
    {
        return $this->belongsTo(ItemType::class, 'fk_type');
    }
}
