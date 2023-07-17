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
        'tag',
        'location',
        'website',
        'email',
        'description'

    ];

    //scopeFilter=> scope is a reserved word it means you can use filter without scope word to call this function
    public function scopeFilter($query, array $filters){
        if($filters['tag']??false)//if it is not false then move on
        {
            $query->where('tags', 'like','%'.request('tag').'%')->get();


        }
    }
}
