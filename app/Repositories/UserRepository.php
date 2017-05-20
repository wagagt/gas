<?php

namespace App\Repositories;

use App\User;
use InfyOm\Generator\Common\BaseRepository;

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_name',
        'first_name',
        'last_name',
        'married_surname',
        'full_name',
        'email',
        'password',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
