<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\RedefinirSenhaNotification;

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
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function rules()
    {
        return [
            'name' => 'required|unique:users,name,'.$this->id.'|min:4|max:40',
            'email' => 'required|unique:users,email,'.$this->id,
            'role' => 'required|in:admin,user',
            'password' => 'required|min:4|confirmed',
        ];
    }

    public function feedback()
    {
        return [
            'required' => 'O campo :attribute deve ser preenchido.',
            'name.min' => 'O campo deve ter no mínimo 4 caracteres.',
            'name.max' => 'O campo deve ter no máximo 40 caracteres.',
            'name.unique' => 'Este nome já está em uso. Por favor, escolha outro.',
            'email.unique' => 'Este email já está em uso. Por favor, escolha outro.',
            'password.required' => 'A senha é obrigatória para realizar a ação.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
            'role.required' => 'Escolha uma das duas roles.',
            'password.confirmed' => 'A senha precisa ser confirmada.',
        ];
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new RedefinirSenhaNotification($token, $this->email, $this->name));
    }
}
