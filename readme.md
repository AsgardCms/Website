## AsgardCMS.com website

This is the repository holding the asgardcms.com website

to install this locally:

- `git clone`
- `composer install`
- `php ./vendor/bin/homestead make --after --aliases`
- configure `Homstead.yaml`
- add site to `/etc/hosts`
- `vagrant up`
- `vagrant ssh`
- `php artisan asgard:install`
