<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// إذا كان التطبيق في وضع الصيانة...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// تسجيل التحميل التلقائي بواسطة Composer
require __DIR__.'/../vendor/autoload.php';

// تحميل التطبيق
$app = require_once __DIR__.'/../bootstrap/app.php';

// تشغيل التطبيق عبر الـ HTTP Kernel
$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
