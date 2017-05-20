<?php

namespace App\Repositories;

use App\Models\Mark;
use InfyOm\Generator\Common\BaseRepository;

class MarkRepository extends BaseRepository
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
        return Mark::class;
    }
}
