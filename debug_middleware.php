<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(App\Http\Kernel::class);
$ref = new ReflectionClass($kernel);
$prop = $ref->getProperty('routeMiddleware');
$prop->setAccessible(true);
$val = $prop->getValue($kernel);
echo json_encode($val, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
