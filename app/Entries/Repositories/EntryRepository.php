<?php namespace Asguard\Entries\Repositories;

interface EntryRepository
{
    /**
     * @param $email
     * @return mixed
     */
    public function subscribe($email);

    /**
     * @return mixed
     */
    public function all();
}
