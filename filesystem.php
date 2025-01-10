<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;

$filesystem = new Filesystem();

try {
    if (!$filesystem->exists('migrations')) {
        $filesystem->mkdir('migrations');
    }
} catch (IOExceptionInterface $exception) {
    echo $exception->getMessage();
}
