<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_domain',
        'report',
        'status_keterangan',
        'status_sitemap',
        'user_id',
        'kategori_id',
        'catatan',
        'status_nerd',
        'slug',
        'internal_report',
        'status_nerd_update'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
