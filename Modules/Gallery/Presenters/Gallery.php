<?php namespace Modules\Gallery\Presenters;

use Laracasts\Presenter\Presenter;

class Gallery extends Presenter
{
    public function targetUrl()
    {
        if (true === $this->entity->has_hidden_website_url) {
            return $this->entity->owner_url;
        }

        return $this->entity->website_url;
    }
}
