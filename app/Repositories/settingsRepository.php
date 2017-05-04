<?php

namespace App\Repositories;

use App\Models\settings;
use InfyOm\Generator\Common\BaseRepository;

class settingsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title_en',
        'title_ar',
        'email',
        'hotline',
        'brand_id',
        'google_analytics'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return settings::class;
    }
}
