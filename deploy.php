<?php

require 'recipe/symfony.php';

server('staging', 'asgardcms.com', 22)
    ->user('forge')
    ->identityFile()
    ->stage('staging')
    ->env('deploy_path', '/home/forge/staging.asgardcms.com');

set('repository', 'git@github.com:AsgardCms/Website.git');

task('deploy', [
    'deploy:prepare',
    'deploy:update_code',
    'deploy:vendors',
    'deploy:symlink',
    'deploy:cleanup'
]);
