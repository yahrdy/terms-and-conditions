<?php

use Hridoy\TermsAndConditions\Http\Controllers\TermsAndConditionsController;
use Illuminate\Support\Facades\Route;

$routePrefix = config('terms_and_conditions.route.prefix');
$routeGuard = config('terms_and_conditions.route.guard');

$groupRules = [];
if ($routePrefix) {
    $groupRules['prefix'] = $routePrefix;
}
if ($routeGuard) {
    $groupRules['middleware'] = $routeGuard;
}
Route::group(['prefix' => $routePrefix], function () {
    Route::apiResource('terms-and-conditions', TermsAndConditionsController::class)->only('index', 'show');
});
Route::group($groupRules, function () {
    Route::apiResource('terms-and-conditions', TermsAndConditionsController::class)->except('index', 'show');
});
