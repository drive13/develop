<?php

use App\Http\Controllers\BisCycController;
use App\Http\Controllers\Co_actController;
use App\Http\Controllers\Co_ObjController;
use App\Http\Controllers\RelatedAccountController;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\TipeIndustriController;
use App\Models\TipeIndustri;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tes', function () {
    return view('backhome');
});

Route::get('/controls', [TipeIndustriController::class, 'index']);
Route::post('/industri/store', [TipeIndustriController::class, 'store']);

Route::get('/controls/{id}', [BisCycController::class, 'index']); //harusnya ke tipeindustricontroller, nanti dirubah
Route::post('/controls/{id}', [BisCycController::class, 'store']);

Route::post('/co/{id}', [Co_ObjController::class, 'store']);

Route::post('/ca/{id}', [Co_actController::class, 'store']);

Route::post('/risk/{id}', [RiskController::class, 'store']);

Route::post('/reaccount/{id}', [RelatedAccountController::class, 'store']);

Route::get('/tes/biscyc', function(){
    $tes = TipeIndustri::with(
            'bisCycs.co_objs.co_acts.risks'
            )
            ->where('id',1 )->get();
    dd($tes);
});