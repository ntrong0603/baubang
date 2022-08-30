<?php

/**
 * Model UserModel
 *
 * @package App\Model
 * @subpackage UserModel
 * @copyright Copyright (c) 2019 Le Trong!.
 * @author Le Trong <ntrong0603.dgt@gmail.com>
 */

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    use Notifiable;
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $timestamps = true;
}
