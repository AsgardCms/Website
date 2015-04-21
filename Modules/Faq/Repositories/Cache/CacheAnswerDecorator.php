<?php namespace Modules\Faq\Repositories\Cache;

use Modules\Core\Repositories\Cache\BaseCacheDecorator;
use Modules\Faq\Repositories\AnswerRepository;

class CacheAnswerDecorator extends BaseCacheDecorator implements AnswerRepository
{
    public function __construct(AnswerRepository $answer)
    {
        parent::__construct();
        $this->entityName = 'faq.answers';
        $this->repository = $answer;
    }
}
