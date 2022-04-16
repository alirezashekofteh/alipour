<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\ArzedigitalController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategorysahamController;
use App\Http\Controllers\Admin\ChannelController;
use App\Http\Controllers\Admin\ChannelUserController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\MenuAdminController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MetapostController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\TermCatController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\QuestionOptionController;
use App\Http\Controllers\Admin\SahamController;
use App\Http\Controllers\Admin\SurveyController;
use App\Http\Controllers\Admin\SurveyQuestionController;
use App\Http\Controllers\Admin\TahlilsahmeController;
use App\Http\Controllers\Admin\SlideshowController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\MainPageController;
use App\Http\Controllers\Admin\MembertimeChannelController;
use App\Http\Controllers\Admin\ContentChannelController;
use App\Http\Controllers\Admin\RedirectUrlController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TraincatController;
use App\Http\Controllers\UserCampController;

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
Route::get('/', [AdminController::class, 'index'])->name('index');
Route::resource('menuadmin', MenuAdminController::class)->except('show');
Route::resource('category', CategoryController::class)->except('show');
Route::resource('post', PostController::class)->except('show');
Route::resource('post.metapost', MetapostController::class)->except('show');
Route::resource('menu', MenuController::class);
Route::resource('term', TermController::class);
Route::resource('department',DepartmentController::class);
Route::resource('ticket', TicketController::class);
Route::resource('term.video', VideoController::class)->except('show');
Route::resource('term.termcat', TermCatController::class)->except('show');
Route::resource('term.download', DownloadController::class)->except('show');
Route::resource('user', UserController::class)->except('show');
Route::resource('saham', SahamController::class);
Route::resource('saham.tahlilsahme', TahlilsahmeController::class);
Route::resource('redirecturl', RedirectUrlController::class);
Route::resource('role', RoleController::class);
Route::resource('traincat', TraincatController::class);
Route::resource('arzedigital', ArzedigitalController::class);
Route::get('user/{user}/userwallet', [UserController::class,'UserWalletform'])->name('userwalletform');
Route::get('user/{user}/orders', [UserController::class,'UserOrder'])->name('UserOrder');
Route::get('user/{user}/channels', [UserController::class,'UserChannels'])->name('UserChannels');
Route::post('user/{user}/orders', [OrderController::class,'Storeorder'])->name('Storeorder');
Route::post('user/{user}/userwallet', [UserController::class,'UserWallet'])->name('UserWallet');
Route::get('orders', [OrderController::class,'index'])->name('orders');
Route::post('orders', [OrderController::class,'index']);
Route::post('orders', [OrderController::class,'index']);
Route::get('check', [OrderController::class,'check']);
Route::get('users/export/', [UserController::class,'export'])->name('user.export');
Route::get('order/export/', [OrderController::class,'export'])->name('order.export');
Route::get('wallet/export/', [AdminController::class,'exportwallet'])->name('wallet.export');
Route::get('channel/export/{channel}', [ChannelController::class,'export'])->name('channel.export');
Route::resource('survey', SurveyController::class);
Route::delete('surveysDeleteAll', [SurveyController::class,'DeleteAll']);
Route::delete('questionsDeleteAll', [SurveyQuestionController::class,'DeleteAll']);
Route::resource('survey.question',SurveyQuestionController::class);
Route::resource('question.option',QuestionOptionController::class);
Route::resource('slideshow', SlideshowController::class);
Route::resource('subscription', SubscriptionController::class);
Route::get('changeStatusOrder', [OrderController::class,'changeStatusOrder']);
Route::resource('post.comments' , CommentController::class)->only(['index' , 'update' , 'destroy']);
Route::get('comments',[CommentController::class,'indexAll'])->name('comments');
Route::resource('mainpage' , MainPageController::class);
Route::get('changestatuscomment', [CommentController::class,'changeStatus']);
Route::get('changesardabirpost', [PostController::class,'changeSardabir']);
Route::resource('categorysaham', CategorysahamController::class);
Route::resource('channel', ChannelController::class);
Route::resource('membertimechannel', MembertimeChannelController::class);
Route::resource('channel.content', ContentChannelController::class)->except('show');
Route::resource('agent', AgentController::class)->except('show');
Route::resource('redirecturl', RedirectUrlController::class)->except('show');
Route::get('comment/{comment}',[CommentController::class,'CommentReply'])->name('comment.reply');
Route::get('referral/{agent}',[AgentController::class,'referrallink'])->name('referral.term');
Route::get('referral/channel/{agent}',[AgentController::class,'referrachannelllink'])->name('referral.channel');
Route::get('/wallet', [AdminController::class, 'wallet'])->name('wallet');
Route::get('/installments', [AdminController::class, 'installments'])->name('installments');
Route::get('/changestatusorder', [OrderController::class, 'changeStatusOrder'])->name('changeStatusOrder');
Route::get('/logintouser/{user:loginid}', [UserController::class, 'logintopanel'])->name('logintopanel');
Route::delete('/channeluser/{channeluser}', [ChannelUserController::class,'destroy'])->name('channeluser.destroy');
Route::delete('/wallete/{wallet}/delete', [AdminController::class,'destroy'])->name('wallet.destroy');
Route::get('/tamdiddoreh', [AdminController::class,'tamdidchannel'])->name('tamdiddoreh');
Route::get('/usercamp', [UserCampController::class,'index'])->name('usercamp');
Route::get('usercamp/export/', [UserCampController::class,'export'])->name('usercamp.export');
Route::get('traincat/{traincat}/post', [TraincatController::class,'getpost'])->name('tarain.post');
Route::post('traincat/{traincat}/post', [TraincatController::class,'setpost'])->name('tarain.post');
Route::delete('/trainpostd/{trainpost}', [TraincatController::class,'destroytrainpost'])->name('trainpost.destroy');
Route::get('changetartibtrainpost', [TraincatController::class,'tartib']);
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
Route::get('wallets123', [AdminController::class,'wallets']);


