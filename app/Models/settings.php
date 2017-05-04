<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class settings
 * @package App\Models
 * @version May 3, 2017, 11:48 am UTC
 */
class settings extends Model
{
    use SoftDeletes;

    public $table = 'settings';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title_en',
        'title_ar',
        'email',
        'hotline',
        'brand_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title_en' => 'string',
        'title_ar' => 'string',
        'email' => 'string',
        'hotline' => 'string',
        'brand_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title_en' => 'required',
        'title_ar' => 'required',
        'email' => 'required',
        'hotline' => 'required',
        'brand_id' => 'required'
    ];

    public function brand()
      {
          return $this->belongsTo('App\Models\brand');
      }
}
