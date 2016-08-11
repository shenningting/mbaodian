<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('index/index');
//});
Route::get('main', function () {
    return view('layouts/master');
});
//首页
Route::get('/', 'IndexController@index');
Route::get('index','IndexController@index');
//登陆
Route::get('login', 'LoginController@login');
Route::get('out', 'LoginController@out');
Route::post('name', 'LoginController@name');
Route::post('email', 'LoginController@email');
Route::post('name_pwd','LoginController@name_pwd');
Route::post('email_pwd','LoginController@email_pwd');
Route::post('name_deng', 'LoginController@name_deng');
Route::post('email_deng','LoginController@email_deng');

//个人中心
Route::get('user/setprofile', 'UserController@setprofile');
Route::get('user/setavator', 'UserController@setavator');
Route::get('user/setphone', 'UserController@setphone');
Route::get('user/setverifyemail', 'UserController@setverifyemail');
Route::get('user/setresetpwd', 'UserController@setresetpwd');
Route::get('user/setbindsns', 'UserController@setbindsns');

//个人中心
Route::get('sms/messages', 'SmsController@messages');
Route::get('sms/messagesone', 'SmsController@messagesone');
Route::get('sms/messagestwo', 'SmsController@messagestwo');
Route::get('sms/notices', 'SmsController@notices');
Route::get('friend/friendlist', 'FriendController@friendlist');
/*
 * 猿问开始
 */
//猿问首页
Route::get('wenda', 'WendaController@wenda');
//我要提问
Route::get('save', 'WendaController@save');
//提交提问
Route::post('tiwen', 'WendaController@tiwen');
//点击标题后进入的详情页面
Route::get('detail', 'WendaController@detail');
//评论
Route::post('hui', 'WendaController@hui');
//点赞
Route::get('zid', 'WendaController@zid');
/*
 * 猿问结束
 */

/*
 * 试题开始
 */
//试题首页
Route::get('shiti', 'CourseController@course');
//试题搜索
Route::post('sou', 'CourseController@sou');
Route::post('s', 'CourseController@s');
Route::post('zhuanye', 'CourseController@zhuanye');
Route::get('xiang', 'CourseController@xiang');
Route::post('con', 'CourseController@con');
Route::get('ping', 'CourseController@ping');
/*
 * 试题结束
 */

//文章
Route::get('article', 'ArticleController@article');
Route::get('publish', 'ArticleController@publish');
Route::post('add', 'ArticleController@add');
Route::post('zan', 'ArticleController@zan');
Route::post('type', 'ArticleController@type');
Route::get('fangfa', 'ArticleController@wxiang');
Route::post('wping', 'ArticleController@wping');
//招聘
Route::get('program', 'ProgramController@program');
Route::get('etc', 'ProgramController@etc');
Route::get('noetc', 'ProgramController@noetc');
Route::get('all', 'ProgramController@all');
Route::get('etc_sel', 'ProgramController@etc_sel');//查看详情
Route::get('position', 'ProgramController@position');
//注册
//Route::post('register', 'CommonController@register');
Route::post('reg','LoginController@reg');
Route::get('register','LoginController@register');
//登陆
Route::post('login', 'CommonController@login');
//公司试题
Route::get('company', 'CompanyController@index');
Route::get('college','CompanyController@college');
Route::get('college_x','CompanyController@college_x');
Route::get('college_exam','CompanyController@college_exam');



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
