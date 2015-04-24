<?php namespace Modules\Entry\Repositories\Cache;

use Modules\Core\Repositories\Cache\BaseCacheDecorator;
use Modules\Entry\Repositories\EntryRepository;

class CacheEntryDecorator extends BaseCacheDecorator implements EntryRepository
{
    public function __construct(EntryRepository $entry)
    {
        parent::__construct();
        $this->entityName = 'entry.entries';
        $this->repository = $entry;
    }

    /**
     * @param int $limit
     * @return object
     */
    public function notAccepted($limit = 50)
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.notAccepted.{$limit}", $this->cacheTime,
                function () use ($limit) {
                    return $this->repository->notAccepted($limit);
                }
            );
    }

    /**
     * @param string $email
     * @return object
     */
    public function findByEmail($email)
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.findByEmail.{$email}", $this->cacheTime,
                function () use ($email) {
                    return $this->repository->findByEmail($email);
                }
            );
    }

    /**
     * @param $email
     * @return mixed
     */
    public function subscribe($email)
    {
        $this->cache->tags($this->entityName)->flush();

        return $this->repository->subscribe($email);
    }

    /**
     * Invite the given entry
     * @param object $entry
     * @return bool
     */
    public function invite($entry)
    {
        $this->cache->tags($this->entityName)->flush();

        return $this->repository->invite($entry);
    }
}
