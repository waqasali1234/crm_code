<?php

use App\Models\SingleRowData;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


// Clear application cache:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('config:cache');
    return 'Application cache cleared';
});


Route::get('/', function () {
    try {
        DB::connection()->getPdo();
        $logo = SingleRowData::where('field_name','logo_file')->first();
        if($logo != null){
            $logo = $logo->field_value;
        }else{
            $logo = null;
        }
    } catch (\Exception $e) {
        $logo = null;
    }
    return redirect()->route('home');
    return view('welcome',compact('logo'));
});



Route::get('lang/{locale}', function($locale){
    if (! in_array($locale, ['en', 'hi'])) {
        abort(400);
    }
    App::setLocale($locale);
    session()->put('applocale', $locale);
    return redirect()->back();
});

Auth::routes([
    'register'=>false
]);


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/waqas', [HomeController::class, 'show']);
