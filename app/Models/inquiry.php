<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class inquiry
 * @package App\Models
 * @version May 3, 2017, 12:10 pm UTC
 */
class inquiry extends Model
{
    use SoftDeletes;

    public $table = 'inquiries';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'mobile',
        'message',
        'subject',
        'brand_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'mobile' => 'string',
        'message' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'mobile' => 'required',
        'message' => 'required'
    ];

    public function brand()
      {
          return $this->belongsTo('App\Models\brand');
      }
}
