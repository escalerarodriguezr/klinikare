<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    public static function create(
        string $type,
        string $email,
        string $password,
        string $name,
        string $role,
        int $actionUserId
    ):self
    {
        $user = new self();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->role = $role;
        $user->type = $type;
        $user->creator_id = $actionUserId;
        return $user;
    }

    public static function createAdmin(
        string $email,
        string $password,
        string $name,
        string $role,
        int $actionUserId
    ):self
    {
        return self::create(
            'ADMIN',
            $email,
            $password,
            $name,
            $role,
            $actionUserId
        );
    }

    public function createdAtAsString(): string
    {
        return $this->created_at->toW3cString();
    }
}
