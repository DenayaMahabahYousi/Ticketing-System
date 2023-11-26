<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user1 extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'complaint', 'admin_id', 'category_id', 'opened_at', 'status_id'];
    protected $table = 'user1';

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}
