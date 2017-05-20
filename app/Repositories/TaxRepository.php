<?php

namespace App\Repositories;

use App\Models\Tax;
use InfyOm\Generator\Common\BaseRepository;

class TaxRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description',
        'percentage',
        'validate',
        'expires',
        'status',
        'company_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tax::class;
    }
}
