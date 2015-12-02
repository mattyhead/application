<?php

/**
 * Test: Nette\Application\Routers\Route with WithUserClass
 */

use Nette\Application\Routers\Route;
use Tester\Assert;


require __DIR__ . '/../bootstrap.php';

require __DIR__ . '/Route.php';


Route::addStyle('#numeric');
Route::setStyleProperty('#numeric', Route::PATTERN, '\d{1,3}');

$route = new Route('<presenter>/<id #numeric>', array());

testRouteIn($route, '/presenter/12/', 'Presenter', array(
	'id' => '12',
	'test' => 'testvalue',
), '/presenter/12?test=testvalue');

testRouteIn($route, '/presenter/1234');

testRouteIn($route, '/presenter/');
