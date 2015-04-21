<?php namespace Modules\Faq\Repositories\Cache;

use Modules\Core\Repositories\Cache\BaseCacheDecorator;
use Modules\Faq\Repositories\FaqRepository;

class CacheFaqDecorator extends BaseCacheDecorator implements FaqRepository
{
    public function __construct(FaqRepository $answer)
    {
        parent::__construct();
        $this->entityName = 'faq.answers';
        $this->repository = $answer;
    }
}
