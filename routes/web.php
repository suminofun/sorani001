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
Route::get('/scrapingfrompersonalpage', 'ScrapingFromPersonalPageController@index');
Route::get('/scrapingdetail', 'ScrapingDetailController@index');
Route::get('/scraping', 'ScrapingController@index');
Route::get('/scrapingtest', 'ScrapingController@test');


Route::get('/contact', 'ContactController@form');
Route::post('/contact/confirm', 'ContactController@confirm');
Route::post('/contact/process', 'ContactController@process');

// 送信メール本文のプレビュー
Route::get('sample/mailable/preview', function () {
  return new App\Mail\SampleNotification();
});

Route::get('/feat', 'FeatController@index01');


Route::get('/put-data', 'HelloController@index02');
Route::get('/list-data', 'HelloController@index03');



Route::get('tagboard', 'TagBoardController@index');
Route::post('tagboard', 'TagBoardController@submit');


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('foo/foo1', 'FooController@foo1');
Route::get('foo/foo2', 'FooController@foo2');
Route::get('foo/foo3', 'FooController@foo3');
Route::get('foo/foo4', 'FooController@foo4');

Route::get('test', 'HelloController@index');

Route::get('student/list','StudentController@getIndex');


Route::group(['prefix' => 'student'], function () {
    Route::get('list', 'StudentController@getIndex'); //一覧
    Route::get('new', 'StudentController@new_index'); //入力
    Route::patch('new','StudentController@new_confirm'); //確認
    Route::post('new', 'StudentController@new_finish'); //完了
    Route::get('edit/{id}/', 'StudentController@edit_index'); //編集
    Route::patch('edit/{id}/','StudentController@edit_confirm'); //確認
    Route::post('edit/{id}/', 'StudentController@edit_finish'); //完了
    Route::post('delete/{id}/', 'StudentController@delete'); //削除
});


Route::get('uploader','UploaderController@getIndex');
Route::post('uploader/confirm','UploaderController@confirm');
Route::post('uploader/finish','UploaderController@finish');


// APIのURL以外のリクエストに対してはindexテンプレートを返す
// 画面遷移はフロントエンドのVueRouterが制御する
Route::get('/{any?}', function () {
    return view('index');
    }
)->where('any', '.+');
