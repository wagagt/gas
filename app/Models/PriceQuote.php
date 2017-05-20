<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="PriceQuote",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="quotation_id",
 *          description="quotation_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="number_term",
 *          description="number_term",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="quote_value_month",
 *          description="quote_value_month",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="insurance_value_month",
 *          description="insurance_value_month",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="tax_value",
 *          description="tax_value",
 *          type="number",
 *          format="float"
 *      )
 * )
 */
class PriceQuote extends Model
{
    use SoftDeletes;

    public $table = 'price_quotes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'quotation_id',
        'number_term',
        'quote_value_month',
        'insurance_value_month',
        'tax_value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'quotation_id' => 'integer',
        'number_term' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function quotation()
    {
        return $this->belongsTo(\App\Models\Quotation::class);
    }
}
