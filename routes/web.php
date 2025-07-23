<?php

use App\Http\Controllers\BisCycController;
use App\Http\Controllers\Co_actController;
use App\Http\Controllers\Co_ObjController;
use App\Http\Controllers\LeadsheetController;
use App\Http\Controllers\PrototypeWPController;
use App\Http\Controllers\RelatedAccountController;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\TipeIndustriController;
use App\Http\Controllers\UnderstandingCAController;
use App\Models\Leadsheet;
use App\Models\UnderstandingCA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

// Route::get('/prototypeWP', [PrototypeWPController::class, 'leadsheet']);
// Route::get('/prototypeWP-understanding/{kodeCA}', [PrototypeWPController::class, 'understanding']);

Route::get('/leadsheet-understanding', [LeadsheetController::class, 'index']); //rutenya nanti harusnya per klient/penugasan
Route::post('/leadsheet/update', [LeadsheetController::class, 'update']);

Route::get('/understanding/{param}', [UnderstandingCAController::class, 'edit']);
Route::post('/understandingCA/create', [UnderstandingCAController::class, 'store']);
Route::post('/understanding/update-ca/{klscpa}', [UnderstandingCAController::class, 'update']);

/**
 * Tes simpan file
 */
Route::get('/form-file', function(){
    return view('tes');
});

Route::post('/terima', function(Request $request){
    
    if ($request->hasFile('file')) {
        $filename = $request->keterangan . '--' . $request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('uploads', $filename, 'public');
        return 'File tersimpan';
    } 

});