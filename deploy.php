<?php
namespace Deployer;
require 'recipe/laravel.php';

set('application', 'DWESPROYECTO');

set('repository', 'https://github.com/Albert-coder-06/DWESPROYECT');

set('git_tty', true);

add('shared_files', ['.env']);
add('shared_dirs', ['storage']);
add('writable_dirs', ['storage', 'bootstrap/cache']);


host('3.88.42.207')
    ->set('remote_user', 'sa04-deployer')
    ->set('identity_file', 'DDAW-KEY-PAIR-B1-albert-danga.pem')
    ->set('deploy_path', '/var/www/es-cipfpbatoi-deployer/html');


task('build', function () {
 run('cd {{release_path}} && build');
});

after('deploy:failed', 'deploy:unlock');

before('deploy:symlink', 'artisan:migrate');