<?php

use App\Http\Controllers\Admin\SitemapController;
use App\Http\Controllers\panel\AgentController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\panel\PanelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\TokenController;
use App\Http\Controllers\payment\ChannelpaymentController;
use App\Http\Controllers\payment\VippaymentController;
use App\Http\Controllers\payment\WalletDirectController;
use App\Http\Controllers\payment\WalletPaymentController;
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

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/token', [TokenController::class, 'showToken'])->name('auth.mobile.token');
Route::post('/token', [TokenController::class, 'token']);
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);
Route::get('/category/{category}', [CategoryController::class, 'list'])->name('category');
Route::get('/videos', [HomeController::class, 'videos'])->name('videos');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/category/{category:slug}', [HomeController::class, 'catblog'])->name('catblog');
Route::get('/blog/{post:slug}', [HomeController::class, 'singleblog'])->name('singleblog')->middleware('vippostview');
Route::get('/term/{term}/part/{part}', [HomeController::class, 'videos'])->name('term.part')->middleware('termview');
Route::Post('comment', [HomeController::class, 'comment'])->name('send.comment');
Route::get('/saham', [HomeController::class, 'saham'])->name('saham');
Route::get('/saham/{saham:slug}', [HomeController::class, 'tahlilsahm'])->name('sahms');
Route::get('/tahlil/{tahlilsahme:slug}', [HomeController::class, 'tahlil'])->name('tahlil');
Route::get('/sahams/{category:slug}', [HomeController::class, 'catsaham'])->name('catsaham');
Route::get('/courses/{term:slug}', [HomeController::class, 'termtak'])->name('termtak');
Route::get('/courses/{term:slug}/test', [HomeController::class, 'termtak2'])->name('termtak2');
Route::get('/courses', [HomeController::class, 'courses'])->name('courses');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('courses/{term:slug}/purchase', [HomeController::class, 'purchase'])->name('term.purchase');
Route::get('payment/callback', [HomeController::class, 'callback'])->name('payment.callback');
Route::get('vip/{subscription}/purchase', [VippaymentController::class, 'purchase'])->name('vip.purchase');
Route::get('vip/callback', [VippaymentController::class, 'callback'])->name('vip.callback');
Route::get('subscription', [HomeController::class, 'subscription'])->name('subscription');
Route::get('/landing', [HomeController::class, 'landing'])->name('landing');
Route::get('/squid-game', [HomeController::class, 'landing2'])->name('landing2');
Route::get('/alpha', [HomeController::class, 'landing3'])->name('landing3');
Route::get('/wallet/{wallet:code}', [WalletDirectController::class, 'wallets'])->name('walletdirect');
Route::get('/wallets/callback', [WalletDirectController::class, 'callback'])->name('walletdirect.callback');
Route::get('/about-us', [HomeController::class, 'aboutus'])->name('about-us');
Route::get('/website-guide', [HomeController::class, 'websiteguide'])->name('website-guide');
Route::get('/sitemap',[SitemapController::class, 'index'] )->name('sitemap');
Route::Post('/usercamp', [UserCampController::class, 'store'])->name('save.usercamp');
Route::get('/tokenusercamp', [UserCampController::class, 'token'])->name('token.usercamp');
Route::post('/tokenusercamp', [UserCampController::class, 'tokenpost'])->name('token.usercamp.post');
Route::get('/arzedigital/chart/{arzedigital:name_en}', [HomeController::class, 'arzedigital'])->name('arzedigital');
Route::get('/course/{term:slug}/video/{video:part}', [HomeController::class, 'video'])->name('course.video')->middleware(['auth','videoview']);

Route::get('/alpha/videos', [HomeController::class, 'landing3video'])->name('landing3.video')->middleware(['auth']);

Route::name('panel.')->middleware('auth')->prefix('panel')->group(function () {
    Route::get('/', [PanelController::class, 'index'])->name('index');
    Route::get('/subscription', [PanelController::class, 'subscription'])->name('subscription');
    Route::get('/orders', [PanelController::class, 'orders'])->name('orders');
    Route::get('/chargewallet', [PanelController::class, 'chargewallet'])->name('chargewallet');
    Route::post('/chargewallet', [WalletPaymentController::class, 'add'])->name('chargewallet');
    Route::get('/chargewallet/callback', [WalletPaymentController::class, 'callback'])->name('chargewallet.callback');
    Route::get('/channel', [PanelController::class, 'channel'])->name('channel');
    Route::get('/profile', [PanelController::class, 'profile'])->name('profile');
    Route::get('/order/{term:slug}', [PanelController::class, 'order'])->name('order')->middleware('termview');
    Route::POST('/order/{order}', [PanelController::class, 'orderghavanin'])->name('orderghavanin');
    Route::put('/profile', [PanelController::class, 'updateprofile'])->name('profile');
    Route::get('/channel/{channel}', [PanelController::class, 'channelview'])->name('channel.view')->middleware('channelview');
    Route::get('/ticket/new', [PanelController::class, 'newticket'])->name('new.ticket');
    Route::get('/tickets', [PanelController::class, 'tickets'])->name('tickets');
    Route::post('/ticket/new', [PanelController::class, 'ticketcreat'])->name('new.ticket');
    Route::get('channels/{member}/purchase', [ChannelpaymentController::class, 'purchase'])->name('channel.purchase');
    Route::get('channels/callback', [ChannelpaymentController::class, 'callback'])->name('channel.callback');
    Route::get('/setting', [PanelController::class, 'setting'])->name('setting');
    Route::post('/setting', [PanelController::class, 'settingsave']);
    Route::get('/course/{term:slug}/video/{video:part}', [PanelController::class, 'video'])->name('course.video')->middleware(['termview','videoview']);
    Route::get('/course/{term:slug}/download', [PanelController::class, 'download'])->name('course.download')->middleware('termview');
    Route::get('/download/{term:slug}/{download}', [PanelController::class, 'downloadfile'])->name('download.file')->middleware(['signed', 'termview']);
    Route::get('/savegoftino', [PanelController::class, 'savegoftino'])->name('savegoftino');

    Route::get('/term/goftino/{term:slug}', [PanelController::class, 'termgoftino'])->name('termgoftino');
    Route::get('/installments', [PanelController::class, 'installments'])->name('installments');





    Route::get('/termsalemobile', [AgentController::class, 'termsalemobileview'])->name('agent.termsalemobile');
    Route::Post('/termsalemobile', [AgentController::class, 'termsalemobile'])->name('agent.termsalemobile');
    Route::get('/token', [AgentController::class, 'tokenview'])->name('agent.token');
    Route::Post('/token', [AgentController::class, 'token'])->name('agent.token');
    Route::get('/terminstallments', [AgentController::class, 'terminstallmentsview'])->name('agent.term.installments');

    Route::Post('/terminstallments', [AgentController::class, 'terminstallments'])->name('agent.term.installments');

    Route::get('/agentlink', [AgentController::class, 'refferallink'])->name('agent.link');

    Route::get('/agentwallet', [AgentController::class, 'walletagent'])->name('agent.wallet');
    Route::get('/agentwalletinstallment', [AgentController::class, 'walletinstallment'])->name('agent.installment');
    Route::get('/agentestelam', [AgentController::class,'estelam'])->name('agent.estelam');
    Route::Post('/agentestelam', [AgentController::class,'estelams'])->name('agent.estelam');
    Route::get('/sendinstallment/{wallet}', [AgentController::class,'sendinstallment'])->name('agent.sendinstallment');
});





Route::get('/commands/{name}', function ($name = null) {
    if ($name == 'clear') {
        try {
            Artisan::call('cache:clear');
            Artisan::call('route:clear');
            Artisan::call('config:clear');
            Artisan::call(' view:clear');

        } catch (Exception $e) {
            return $e->getMessage();
        }
     } else {
        abort(404);
    }
});
