<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'https://github.com/rizarisyam/ecommerce-app-v2.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);


// Hosts

host('128.199.224.71')
    ->user('riza')
    ->set('deploy_path', '/var/www/html/ecommerce-app');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
    run('php artisan key:generate');
    run('npm install');
    run('npm run prod');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

