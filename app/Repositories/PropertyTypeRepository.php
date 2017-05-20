<?php

namespace App\Repositories;

use App\Models\PropertyType;
use InfyOm\Generator\Common\BaseRepository;

class PropertyTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'property',
        'company_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PropertyType::class;
    }
}
