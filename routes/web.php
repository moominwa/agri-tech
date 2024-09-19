<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TeamController;
use App\Http\Livewire\FixtureManagement;
use App\Http\Livewire\DisplayFixtures;
use App\Http\Livewire\FootballMatchResults;

// Route::get('/match-results', function () {
//     return view('match-results');
// })->name('match-results');

Route::get('/player-statistics', function () {
    return view('player-statistics');
})->name('player-statistics');

Route::get('/scoreboard', function () {
    return view('scoreboard');
})->name('scoreboard');

Route::get('/admin-display-fixtures', function () {
    return view('display-fixtures');
})->name('display-fixtures');

Route::get('/leader-display-fixtures', function () {
    return view('display-fixtures');
})->name('display-fixtures');

Route::get('/display-fixtures', function () {
    return view('display-fixtures');
})->name('display-fixtures');

Route::get('/football-match-results', function () {
    return view('football-match-results');
})->name('football-match-results');

Route::get('/fixture-management', function () {
    return view('fixture-management');
})->name('fixture-management');

Route::get('/match-results', function () {
    return view('match-results');
})->name('match-results');

// Route อื่นๆ
Route::post('/check-student-code', [RegisterController::class, 'checkStudentCode']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Auth::routes();



Route::get('/team-approval', function () {
    return view('team-approval');
})->name('team-approval');


Route::get('/register-menu', function () {
    return view('registermenu');
});

Route::get('/', function () {
    return view('navbar');
});

Route::get('/test-route', function () {
    return view('test');
});

Route::get('/score', function () {
    return view('score');
});

Route::get('/admin/dashboard', function () {
    return view('admin-dashboard');
})->name('admin-dashboard');

Route::get('/open_close', function () {
    return view('open_close');
})->name('open_close');

Route::get('/edit-profile-admin', function () {
    return view('edit-profile-admin');
})->name('edit-profile-admin');

Route::get('/check_teams', function () {
    return view('check-teams');
})->name('check-teams');

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

Route::post('/teams/store', [TeamController::class, 'store'])->name('teams.store');

Route::get('/check_player', function () {
    return view('check_player');
})->name('check_player');

Route::get('/check_pay', function () {
    return view('check_pay');
})->name('check_pay');

Route::get('/status_team', function () {
    return view('status_team');
})->name('status_team');

Route::get('/status_pay', function () {
    return view('status_pay');
})->name('status_pay');

Route::get('/addmin', function () {
    return view('addmin');
});

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


Route::get('/star_score', function () {
    return view('star_score');
});

Route::get('/score_team', function () {
    return view('score_team');
});

Route::get('/leader_score', function () {
    return view('leader-score');
});

Route::get('/leader_player_information', function () {
    return view('leader-player-information');
});

Route::get('/leader_star_score', function () {
    return view('leader-star-score');
});

Route::get('/leader_score_table', function () {
    return view('leader-score-table');
});

Route::get('/leader_score_team', function () {
    return view('leader-score-team');
});

Route::get('/paymentsure', function () {
    return view('paymentsure');
});

Route::get('/payment-form', function () {
    return view('payment_form');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

