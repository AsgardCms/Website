<?php namespace Modules\Module\Presenters;

use Laracasts\Presenter\Presenter;

class Module extends Presenter
{
    const PACKAGIST_URL = 'https://packagist.org/packages/';

    public function packagistUrl()
    {
        return self::PACKAGIST_URL . $this->entity->packagist_uri;
    }

    public function status()
    {
        if ($this->entity->isInReview() === true) {
            return '<span class="label label-danger">Awaiting review</span>';
        }
        if ($this->entity->isInReview() === false) {
            return '<span class="label label-default">W.I.P.</span>';
        }
        if ($this->entity->isPublished() === true) {
            return '<span class="label label-success">Online</span>';
        }
        if ($this->entity->isRejected() === true) {
            return '<span class="label label-danger">Rejected</span>';
        }

        return '<span class="label label-default">Unknown</span>';
    }
}
