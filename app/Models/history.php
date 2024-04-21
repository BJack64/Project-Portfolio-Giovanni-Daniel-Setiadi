<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class history extends Model
{
    use HasFactory;
    protected $table = "history";
    protected $fillable = [
        'title',
        'type',
        'start_date',
        'finish_date',
        'info1',
        'info2',
        'info3',
        'content',
    ];
    protected $appends = ['start_date_indo', 'finish_date_indo'];

    public function getStartDateIndoAttribute() {
        return Carbon::parse($this->attributes['start_date'])->translatedFormat('d F Y');
    }

    public function getFinishDateIndoAttribute() {
        if($this->attributes['finish_date']) {
            return Carbon::parse($this->attributes['finish_date'])->translatedFormat('d F Y');
        } else {
            return 'Present';
        }
    }
}