<?php

require_once 'vendor/deployer/deployer/recipe/common.php';
//require_once 'vendor/deployphp/recipes/recipes/cachetool.php';

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

task('migrate', function () {
    run('cd {{release_path}}; php artisan module:migrate;');
})->desc('Running module migrations');

task('reload:php-fpm', function () {
    run('/etc/init.d/php5-fpm restart');
});

/**
 * Swap the MySQL database
 */
task('mysql', function () {
    $releases = env('releases_list');
    $stage = input()->getArgument('stage');

    $oldDatabaseName = "asgard_{$stage}_{$releases['1']}";
    $newDatabaseName = "asgard_{$stage}_{$releases['0']}";
    // 1. Export current db
    run("mysqldump --defaults-file=/etc/mysql/my.cnf --no-create-db $oldDatabaseName > {{deploy_path}}/shared/$oldDatabaseName.sql");
    // 2. create new db
    run("mysql -po5Stxd1ocDZfACp4PmsL -e 'create database $newDatabaseName;'");
    // 3. import database
    run("mysql -po5Stxd1ocDZfACp4PmsL $newDatabaseName < {{deploy_path}}/shared/$oldDatabaseName.sql");
    // 4. replace db name in current/.env and shared/.env
    run("sed -i 's/$oldDatabaseName/$newDatabaseName/g' {{deploy_path}}/shared/.env");
    run("sed -i 's/$oldDatabaseName/$newDatabaseName/g' {{release_path}}/.env");

    // 5. remove old database
    run("mysqladmin -po5Stxd1ocDZfACp4PmsL -f drop $oldDatabaseName");
    run("rm {{deploy_path}}/shared/$oldDatabaseName.sql");

})->desc('swap mysql databases');



// Laravel writable dirs
set('writable_dirs', ['storage', 'vendor']);

task('cachetool:clear:opcache', function () {
    $releasePath = env('release_path');
    $options = get('cachetool', '');
    if (strlen($options)) {
        $options = "--fcgi={$options}";
    }
    cd($releasePath);
    $hasCachetool = run("if [ -e $releasePath/cachetool.phar ]; then echo 'true'; fi");
    if ('true' !== $hasCachetool) {
        run("curl -sO http://gordalina.github.io/cachetool/downloads/cachetool.phar");
    }
    run("php cachetool.phar opcache:reset {$options}");
})->desc('Clearing OPcode cache');

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
    //'migrate',
    //'mysql',
])->desc('Deploy your project');
//task('deploy', [
//    'deploy:release',
//    'deploy:symlink',
//    'cleanup',
//    'mysql',
//])->desc('Deploy your project');

after('deploy', 'cachetool:clear:opcache');
after('deploy', 'success');
