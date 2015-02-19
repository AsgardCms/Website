<?php namespace Asgard\Services;

use Github\Client;
use SebastianBergmann\Exporter\Exception;

class GithubService
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->client->authenticate(config('services.github.token'), 'http_token');
    }

    /**
     * Add a team member to AsgardCms
     * @param string $githubUsername
     * @return \Guzzle\Http\EntityBodyInterface|mixed|string
     */
    public function addTeamMember($githubUsername)
    {
        try {
            return $this->client->organization()->teams()->addMember('1132536', $githubUsername);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
