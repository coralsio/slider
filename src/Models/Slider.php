<?php

namespace Corals\Modules\Slider\Models;

use Corals\Foundation\Models\BaseModel;
use Corals\Foundation\Transformers\PresentableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

class Slider extends BaseModel
{
    use PresentableTrait;
    use LogsActivity;

    /**
     *  Model configuration.
     * @var string
     */
    public $config = 'slider.models.slider';

    protected $casts = [
        'init_options' => 'array',
    ];

    protected $guarded = ['id'];

    public function setKeyAttribute($value)
    {
        $this->attributes['key'] = \Str::slug($value);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function slides()
    {
        return $this->hasMany(Slide::class);
    }

    public function activeSlides()
    {
        return $this->hasMany(Slide::class)->where('status', 'active');
    }
}
