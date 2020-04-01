<?php

use Core\Database;

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function view(string $path, array $vars = [])
{
    extract($vars);
    include(__DIR__ . '/app/Views/' . $path . '.php');
}

function redirect(string $location)
{
    header('Location: ' . $location);
    exit;
}

function config(string $key, string $defaultValue = ''): string
{
    $defaultValue = !empty($defaultValue) ? $defaultValue : $key;
    [$fileName, $configKey] = explode('.', $key, 2);
    $config = include __DIR__ . '/config/' . $fileName . '.php';

    return $config[$configKey] ?? $defaultValue;
}

function database()
{
    return Database::$instance->connection();
}


function checkExistance(string $sku): bool
{
    $data = database()->select('products', '*', [
        'sku' => $sku
    ]);

    if ($data) {
        $_SESSION['msgClass'] = 'warning';
        $_SESSION['msg'] = 'There already exist product with such SKU, please change it.';
        return true;
    }
    return false;
}

