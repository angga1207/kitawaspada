<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    // table
    protected $table = 'roles';

    // fillable
    protected $fillable = [
        'name',
        'slug',
        'permissions',
        'status',
    ];

    // onCreate
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            // query slug start
            $slug = Str::slug($query->name);
            $slugCount = count(static::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get());
            $query->slug = $slugCount ? "{$slug}-{$slugCount}" : $slug;
            // query slug end
        });
    }

    // casts
    protected $casts = [
        'permissions' => 'array',
    ];

    // accessor
    public function getPermissionsAttribute($value)
    {
        return json_decode($value, true);
    }

    // mutator
    public function setPermissionsAttribute($value)
    {
        $this->attributes['permissions'] = json_encode($value, true);
    }

    // relationships
    public function Users()
    {
        return $this->hasMany(User::class);
    }
}
