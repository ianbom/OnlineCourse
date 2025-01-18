<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [
       'id'
    ];

     protected $table = 'users';
     protected $primaryKey = 'id';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function subscription(){
        return $this->hasMany(Subscription::class, 'id', 'id');
    }

    public function order(){
        return $this->hasMany(Order::class, 'id', 'id');
    }

    public function rating(){
        return $this->hasMany(Rating::class, 'id', 'id');
    }

    public function note(){
        return $this->hasMany(Note::class, 'id', 'id');
    }

    public function saveCourse(){
        return $this->hasMany(Save::class, 'id', 'id');
    }

    public function answer(){
        return $this->hasMany(Answer::class, 'id', 'id');
    }

    public function history(){
        return $this->hasMany(History::class, 'id', 'id');
    }

    public function finished(){
        return $this->hasMany(Finished::class, 'id', 'id');
    }


}
