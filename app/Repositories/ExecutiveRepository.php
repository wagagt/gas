<?php

namespace App\Repositories;

use App\Models\Executive;
use InfyOm\Generator\Common\BaseRepository;

class ExecutiveRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'executive_code',
        'full_name',
        'email',
        'office_phone',
        'mobile_phone',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Executive::class;
    }
}
