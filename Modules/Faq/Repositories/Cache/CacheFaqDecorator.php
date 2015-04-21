<?php namespace Modules\Faq\Repositories\Cache;

use Modules\Core\Repositories\Cache\BaseCacheDecorator;
use Modules\Faq\Repositories\FaqRepository;

class CacheFaqDecorator extends BaseCacheDecorator implements FaqRepository
{
    public function __construct(FaqRepository $faq)
    {
        parent::__construct();
        $this->entityName = 'faq.faqs';
        $this->repository = $faq;
    }
}
