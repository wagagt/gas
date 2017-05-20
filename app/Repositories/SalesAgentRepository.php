<?php

namespace App\Repositories;

use App\Models\SalesAgent;
use InfyOm\Generator\Common\BaseRepository;

class SalesAgentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sales_agent',
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
        return SalesAgent::class;
    }
}
