<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\DB;
Auth::routes();
Route::get('/register-menu', function () {
    return view('registermenu');
});

Route::get('/', function () {
    return view('navbar');
});
Route::get('/score', function () {
    return view('score');

});
use App\Http\Controllers\TeamController;

Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');


Route::get('/player_information', [TeamController::class, 'index']);






Route::get('/open_close', function () {
    return view('open_close');
})->name('open_close');
Route::get('/edit-profile-admin', function () {
    return view('edit-profile-admin');
})->name('edit-profile-admin');

Route::get('/football-grouping', function () {
    return view('football-grouping');
})->name('football-grouping');

Route::get('/manage-results', function () {
    return view('manage-results');
})->name('manage-results');

Route::get('/manage-schedule', function () {
    return view('manage-schedule');
})->name('manage-schedule');

Route::get('/manage-statistics', function () {
    return view('manage-statistics');
})->name('manage-statistics');

Route::get('/check_team', function () {
    return view('check_team');
})->name('check_team');

Route::get('/check_pay', function () {
    return view('check_pay');
})->name('check_pay');

Route::get('/status_team', function () {
    return view('status_team');
})->name('status_team');

Route::get('/status_pay', function () {
    return view('status_pay');
})->name('status_pay');

Route::get('/check_player', function () {
    return view('check_player');
})->name('check_player');

Route::get('/addmin', function () {
    return view('addmin');
});


// ปัง----------------------------------------------------------------------------------------

Route::get('/score_table', function () {
    return view('score_table');
});
Route::get('/payment', function () {
    return view('payment');
});
Route::get('/list_team', function () {
    return view('list_team');
});
Route::get('/team_information', function () {
    return view('team_information');
});

Route::get('/player_information', function () {
    return view('player_information');
});
Route::get('/star_scorer', function () {
    return view('star_scorer');
});
Route::get('/score_table', function () {
    return view('score_table');
});

Route::get('/score_team', function () {
    return view('score_team');
});

Route::get('/score', function () {
    return view('score');
});

Route::get('/paymentsure', function () {
    return view('paymentsure');
});



// จบ-----------------------------------------------------------------------------------------

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
