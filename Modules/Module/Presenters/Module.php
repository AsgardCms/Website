<?php namespace Modules\Module\Presenters;

use Laracasts\Presenter\Presenter;

class Module extends Presenter
{
    const PACKAGIST_URL = 'https://packagist.org/packages/';

    public function packagistUrl()
    {
        return self::PACKAGIST_URL . $this->entity->packagist_uri;
    }
}
