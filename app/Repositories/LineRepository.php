<?php

namespace App\Repositories;

use App\Models\Line;
use InfyOm\Generator\Common\BaseRepository;

class LineRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Line::class;
    }
}
