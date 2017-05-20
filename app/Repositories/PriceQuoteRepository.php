<?php

namespace App\Repositories;

use App\Models\PriceQuote;
use InfyOm\Generator\Common\BaseRepository;

class PriceQuoteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'quotation_id',
        'number_term',
        'quote_value_month',
        'insurance_value_month',
        'tax_value'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PriceQuote::class;
    }
}
