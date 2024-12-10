<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');




Route::middleware([

    ])->group(function () {
         Route::get('/dashboard', function () {
           if (auth()->user()->role == 1) {
            return redirect()->route('Admindashboard');
           }
           else if (auth()->user()->role == 2) {
            return redirect()->route('Eventdashboard');
           }
           else{
            return redirect()->route('user-dashboard');
           }
         })->name('userdashboard');

    });

    Route::prefix('admin')->middleware('admin')->group(function(){
        Route::get('/Admindashboard', function(){
            return view('admin.index');
        })->name('Admindashboard');

        Route::get('/add-event', function(){
            return view('admin.add-event');
        })->name('admin.add-event');

        Route::get('/new-register', function(){
            return view('admin.new-register');
        })->name('admin.newregister');



     });

     Route::prefix('event')->middleware('event')->group(function(){
        Route::get('/Eventdashboard', function(){
            return view('event-coordinator.index');
        })->name('Eventdashboard');



     });

     Route::prefix('user')->middleware('user')->group(function(){
        Route::get('/dashboard', function(){
               return view('user.index');
           })->name('user-dashboard');

           Route::get('/news', function(){
            return view('user.news');
        })->name('user-news');



    });


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
