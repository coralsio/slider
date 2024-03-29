<?php

namespace Corals\Modules\Slider\Policies;

use Corals\Foundation\Policies\BasePolicy;
use Corals\Modules\Slider\Models\Slide;
use Corals\User\Models\User;

class SlidePolicy extends BasePolicy
{
    protected $administrationPermission = 'Administrations::admin.cms';

    /**
     * @param User $user
     * @return bool
     */
    public function view(User $user)
    {
        if ($user->can('CMS::slider.view')) {
            return true;
        }

        return false;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('CMS::slider.create');
    }

    /**
     * @param User $user
     * @param Slide $slide
     * @return bool
     */
    public function update(User $user, Slide $slide)
    {
        if ($user->can('CMS::slider.update')) {
            return true;
        }

        return false;
    }

    /**
     * @param User $user
     * @param Slide $slide
     * @return bool
     */
    public function destroy(User $user, Slide $slide)
    {
        if ($user->can('CMS::slider.delete')) {
            return true;
        }

        return false;
    }
}
