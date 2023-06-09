<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){


    Route::get('/', function () {
        return view('programs.create');
    });


    Route::get('admin/login', function () {
        return view('admin.auth.login');
    });


});



/*
 * $monday = Carbon::now()->startOfWeek();
   $sunday = Carbon::now()->endOfWeek();

  $carbaoDay = Carbon::createFromFormat('Y-m-d', $request->day);
  //spesific day format 2000-01-00

   $carbaoDay->startOfWeek()->addDay($i)->format('Y-m-d');
   $carbaoDay->startOfWeek() /// always monday
    ->addDay($i)->format('Y-m-d'); //$i =1 push: 2000-01-01 ,;//$i =2 push: 2000-01-02


    $week = [];
    for ($i=0; $i <7 ; $i++) {
        $week[] = $carbaoDay->startOfWeek()->addDay($i)->format('Y-m-d');//push the current day and plus the mount of $i
    }


output:
    array:7 [
  0 => "2020-01-06"
  1 => "2020-01-07"
  2 => "2020-01-08"
  3 => "2020-01-09"
  4 => "2020-01-10"
  5 => "2020-01-11"
  6 => "2020-01-12"
]

Carbon::parse($item['created_at'])->format('h:i:s');
public function getBeginAttribute($date)
{
    return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('hh:mm');
}

protected $casts = [
    'begin' => 'date:hh:mm'
];

 */