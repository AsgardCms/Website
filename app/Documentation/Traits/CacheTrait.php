<?php namespace Asgard\Documentation\Traits;

trait CacheTrait
{
    /**
     * Returns the cached content if NOT running locally.
     *
     * @param string $key
     * @param mixed $value
     * @param int $time
     * @return mixed
     */
    public function cached($key, $value, $time = 5)
    {
        /** @var \Illuminate\Contracts\Cache\Repository $cache */
        $cache = app('Illuminate\Contracts\Cache\Repository');
        return $cache->remember($key, $time, function () use ($value) {
            return $value;
        });
    }
}
