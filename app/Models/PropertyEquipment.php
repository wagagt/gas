<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="PropertyEquipment",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="properties",
 *          description="properties",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="modelo_id",
 *          description="modelo_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="mark_id",
 *          description="mark_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="line_id",
 *          description="line_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="color",
 *          description="color",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="uploads",
 *          description="uploads",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="property_type_id",
 *          description="property_type_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class PropertyEquipment extends Model
{
    use SoftDeletes;

    public $table = 'property_equipments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'properties' => 'string',
        'modelo_id' => 'integer',
        'mark_id' => 'integer',
        'line_id' => 'integer',
        'color' => 'string',
        'uploads' => 'string',
        'property_type_id' => 'integer'
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
    public function line()
    {
        return $this->belongsTo(\App\Models\Line::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function mark()
    {
        return $this->belongsTo(\App\Models\Mark::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function modelo()
    {
        return $this->belongsTo(\App\Models\Modelo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function propertyType()
    {
        return $this->belongsTo(\App\Models\PropertyType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function insuranceRates()
    {
        return $this->hasMany(\App\Models\InsuranceRate::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function quotations()
    {
        return $this->hasMany(\App\Models\Quotation::class);
    }
}
