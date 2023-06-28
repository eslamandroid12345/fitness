<?php

use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\dashboard\DayController;
use App\Http\Controllers\dashboard\ProgramController;
use App\Http\Controllers\dashboard\SettingController;
use App\Http\Controllers\dashboard\WeekController;
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


//    Route::get('/', function () {
//        return view('programs.create');
//    });


    Route::group(['prefix' => 'admin'], function (){

        Route::get('login',[AdminController::class,'login'])->name('admin.login');
        Route::post('login',[AdminController::class,'loginProcess'])->name('admin.login');

    });

    Route::get('/',[AdminController::class,'welcome'])->name('admin.welcome')->middleware('auth:admin');


    Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function (){

        Route::get('all',[AdminController::class,'all'])->name('admin.all');
        Route::get('register',[AdminController::class,'register'])->name('admin.register');
        Route::post('register',[AdminController::class,'registerProcess'])->name('admin.register');
        Route::post('logout',[AdminController::class,'logout'])->name('admin.logout');

    });



    Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function (){

        Route::resource('setting',SettingController::class)->except(['show','destroy']);
        Route::get('setting/delete/{id}',[SettingController::class,'delete'])->name('setting.delete');


        Route::resource('programs',ProgramController::class)->except(['show','destroy']);
        Route::get('programs/delete/{id}',[ProgramController::class,'delete'])->name('programs.delete');


        Route::resource('weeks',WeekController::class)->except(['show','destroy','index']);
        Route::get('weeks/all/{id}',[WeekController::class,'allWeeks'])->name('weeks.all');
        Route::get('weeks/delete/{id}',[WeekController::class,'delete'])->name('weeks.delete');

        Route::resource('days',DayController::class)->except(['show','destroy','index']);
        Route::get('days/all/{id}',[DayController::class,'allDays'])->name('days.all');
        Route::get('days/delete/{id}',[DayController::class,'delete'])->name('days.delete');


        Route::get('contacts',[AdminController::class,'contacts'])->name('admin.contacts');
        Route::get('users/subscribes',[AdminController::class,'allSubscribes'])->name('admin.user.subscribes');


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


/*
 Name: Test
Number: 4242 4242 4242 4242
CSV: 123
Expiration Month: 12
Expiration Year: 2028
 */



/*
  public function index(){


    }


    public function create(){


    }



    public function store(Request $request){


    }


    public function edit(Setting $setting){


    }


    public function update(Request $request,Setting $setting){


    }


    public function delete(Setting $setting){


    }
 */