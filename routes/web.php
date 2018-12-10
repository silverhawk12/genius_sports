<?php

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
Route::get('/', function () {
    return view('welcome');
});
Route::resource('teams', 'TeamController');

Route::get('tournaments/{tournament}/teams', 'TournamentController@addTeams')->name('tournaments.add_teams');
Route::get('tournaments/random-teams/{tournament}', 'MatchController@randomlyCreateFirstRoundMatches')->name('tournaments.add_random_teams');
Route::post('tournaments/{tournament}/teams', 'MatchController@saveFirstRoundTeams')->name('tournaments.save_first_round_teams');
Route::get('tournaments/{tournament}/round/{round}', 'MatchController@getMatchesPerRound')->name('tournaments.round');
Route::post('tournaments/{tournament}/round/{round_id}/save', 'MatchController@saveMatches')->name('tournaments.save_round');
Route::resource('tournaments', 'TournamentController');


//Ajax Routes
Route::post('/ajax/teams', 'AjaxController@getAllTeams')->name('ajax.teams');
Route::get('/ajax/matches/{tournament}', 'AjaxController@getMatches')->name('ajax.get');