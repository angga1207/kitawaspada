<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\Searchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, Searchable;

    protected $fillable = [
        'name',
        'firstname',
        'lastname',
        'email',
        'username',
        'avatar',
        'password',
        'status',
        'login_attempt',
        'last_login_at',
        'last_login_json',
        'role_id',
    ];

    // onCreate
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            // query firstname start
            $firstname = str()->of($query->name)->explode(' ')[0];
            $query->firstname = $firstname;
            // query firstname end

            // query lastname start
            $lastname = str()->of($query->name)->explode(' ')[1] ?? null;
            $query->lastname = $lastname;
            // query lastname end

        });
    }

    protected $searchable = [
        'name',
        'firstname',
        'lastname',
        'username',
        'role.name',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // accessor
    public function getLastLoginJsonAttribute($value)
    {
        return json_decode($value, true);
    }

    // mutator
    public function setLastLoginJsonAttribute($value)
    {
        $this->attributes['last_login_json'] = json_encode($value, true);
    }


    public function Role()
    {
        return $this->belongsTo(Role::class);
    }

    function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
