<?php namespace Modules\Profile\Repositories\Cache;

use Modules\Core\Repositories\Cache\BaseCacheDecorator;
use Modules\Profile\Repositories\ProfileRepository;

class CacheProfileDecorator extends BaseCacheDecorator implements ProfileRepository
{
    public function __construct(ProfileRepository $profile)
    {
        parent::__construct();
        $this->entityName = 'profile.profiles';
        $this->repository = $profile;
    }
}
