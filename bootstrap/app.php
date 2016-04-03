<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
	realpath(__DIR__.'/../')
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
	'Illuminate\Contracts\Http\Kernel',
	'TaskManagement\Http\Kernel'
);

$app->singleton(
	'Illuminate\Contracts\Console\Kernel',
	'TaskManagement\Console\Kernel'
);

$app->singleton(
	'Illuminate\Contracts\Debug\ExceptionHandler',
	'TaskManagement\Exceptions\Handler'
);

$app->singleton(
	'Illuminate\Contracts\Debug\ExceptionHandler',
	'TaskManagement\Exceptions\Handler'
);

$app->bind('TaskManagement\Http\Services\ITaskService', 'TaskManagement\Http\Services\impl\TaskService');
$app->bind('TaskManagement\Http\Services\IUserService', 'TaskManagement\Http\Services\impl\UserService');

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
