## AsgardCMS.com website details:-

This is the repository containing the asgardcms.com website data and backend program,

To install this locally, follow these steps in-order:

- `git clone`
- `composer install`
- `php ./vendor/bin/homestead make --after --aliases`
- configure `Homstead.yaml`
- Add site to `/etc/hosts`
- `vagrant up`
- `vagrant ssh`
- `php artisan asgard:install`

After this you are done with downloading.
