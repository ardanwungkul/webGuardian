<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'report',
        'tanggal_report',
        'judul',
        'domain_id',
        'link_youtube',
        'image'
    ];
    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
}
