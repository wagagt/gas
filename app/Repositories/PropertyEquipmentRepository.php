<?php

namespace App\Repositories;

use App\Models\PropertyEquipment;
use InfyOm\Generator\Common\BaseRepository;

class PropertyEquipmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'properties',
        'modelo_id',
        'mark_id',
        'line_id',
        'color',
        'uploads',
        'property_type_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PropertyEquipment::class;
    }
}
