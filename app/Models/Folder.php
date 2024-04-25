<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;
    protected $fillable = [
        'spintax',
        'title'
    ];

    public function domain()
    {
        return $this->belongsToMany(Domain::class, 'pivot_folder_domain', 'folder_id', 'domain_id');
    }
}
