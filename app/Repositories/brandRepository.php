<?php

namespace App\Repositories;

use App\Models\brand;
use InfyOm\Generator\Common\BaseRepository;

class brandRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name_en',
        'name_ar',
        'keyword_en',
        'keyword_ar',
        'description_en',
        'description_ar',
        'google_analytics'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return brand::class;
    }
}
