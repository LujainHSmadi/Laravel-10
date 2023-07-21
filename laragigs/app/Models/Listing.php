<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'company',
        'tags',
        'location',
        'website',
        'email',
        'description',
        'logo'

    ];

    protected $casts = [
        'tags' => 'array'
    ];

    //scopeFilter=> scope is a reserved word it means you can use filter without scope word to call this function
    public function scopeFilter($query, array $filters){
        if($filters['tag']??false)//if it is not false then move on
        {
            $query->where('tags', 'like','%'.request('tag').'%')->get();

        }
        if($filters['search']??false){
            $query->where('title','like','%'.request('search').'%')
            ->orWhere('description','like','%'.request('search').'%')
            ->orWhere('tags', 'like','%'.request('search').'%')
            ->get();
        }
    }
}
