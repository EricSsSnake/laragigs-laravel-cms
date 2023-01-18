<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['company', 'user_id', 'title', 'email', 'website', 'description', 'tags', 'location', 'logo'];

    public function scopeFilter($query, $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orwhere('description', 'like', '%' . request('search') . '%')
                ->orwhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    public function user()
    {
        return $this->BelongsTo(User::class, 'user_id');
    }
}
