<?php

// require 'recipe/laravel.php';
require_once 'recipe/common.php';

set('keep_releases', 5);

server('staging', 'asgardcms.com', 22)
    ->user('forge')
    ->identityFile()
    ->stage('staging')
    ->env('branch', 'develop')
    ->env('deploy_path', '/home/forge/staging.asgardcms.com');

set('repository', 'git@github.com:AsgardCms/Website.git');

/**
 * Setup the environment file in the new release
 */
task('environment', function () {
    run('cp /home/forge/staging.asgardcms.com/shared/.env {{release_path}}/.env');
})->desc('Doing my stuff');

// Laravel writable dirs
set('writable_dirs', ['storage', 'vendor']);

/**
 * Main task
 */
task('deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:vendors',
    'deploy:symlink',
    'cleanup',
    'environment',
])->desc('Deploy your project');

after('deploy', 'success');
