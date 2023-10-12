<?php
chdir(__DIR__); // Mude para o diretório raiz do projeto Laravel
require 'vendor/autoload.php'; // Carregue o autoloader do Composer
$app = require_once 'bootstrap/app.php'; // Inicialize a aplicação Laravel

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$status = $kernel->handle(
    new Symfony\Component\Console\Input\ArgvInput(['artisan', 'storage:link']),
    new Symfony\Component\Console\Output\ConsoleOutput()
);

$kernel->terminate(
    new Symfony\Component\Console\Input\ArgvInput(['artisan', 'storage:link']),
    $status
);

exit($status);
