<?php

namespace App\Http\Controllers;

use App\Models\Arzedigital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\MainPage;
use App\Models\post;
use App\Models\Saham;
use App\Models\Slideshow;
use App\Models\Tahlilsahme;
use App\Models\Term;
use App\Models\Category;
use App\Models\Comment;
use App\Models\UserCamp;
use App\Models\Video;
use App\Models\Wallet;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as ShetabitPayment;
use Artesaos\SEOTools\Facades\SEOTools;
use URL;
use App\Notifications\SendTermSuccess;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $main=MainPage::first();
        SEOTools::setTitle($main->title);
        SEOTools::setDescription($main->description);
        SEOTools::setCanonical(Url::full());

        $slideshows = Slideshow::where('active', '1')->latest()->get();
        $terms = Term::where('access', '1')->latest()->get();
        $tahlilsahms = Tahlilsahme::where('active', '1')->get();
        $posts = post::where('active', '1')->latest()->limit(16)->get();
        $mainpage = MainPage::first();
     
        return view('Front.index', compact(['slideshows', 'terms', 'tahlilsahms', 'posts', 'mainpage']));
    }
    public function singleblog(Post $post)
    {
        $title=isset($post->title) ? $post->title : $post->name;
        $description=isset($post->description) ? $post->description : Str::limit(strip_tags($post->fullcontent),250);
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(Url::full());

        $posts = post::where('active', '1')->latest()->limit(10)->get();
        return view('Front.single-blog', compact(['post', 'posts']));
    }
    public function blog()
    {
        $title='وبلاگ';
        $description='توضیحات';
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(Url::route('blog'));


        $vipcats = Category::where('vip', '1')->where('type','post')->get();
        $cats = Category::where('type','post')->where('parent','0')->get();
        $posts = post::where('active', '1')->latest()->simplePaginate(24);
        $mainpage = MainPage::first();
        $sardabirs = post::where('sardabir', '1')->limit(10)->latest()->get();
        return view('Front.blog', compact(['vipcats', 'cats',  'posts', 'mainpage', 'sardabirs']));
    }
    public function catblog(Category $category)
    {
        $title=isset($category->title) ? $category->title : $category->name;
        $description=isset($category->description) ? $category->description : $category->content;
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(Url::full());


        $cats=$category->child;
        $categories = $category->descendants()->add($category)->pluck('id');
        $posts = Post::whereHas('category', function ($query) use ($categories) {
            return $query->whereIn('id', $categories);
        })->latest()->simplePaginate(16);
        return view('Front.catblog', compact([ 'posts','cats','category']));
    }
    public function saham()
    {
        $title='لیست سهام';
        $description='لیست سهام';
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(Url::route('saham'));

        $saham = Saham::where('active', '1')->get();
        return view('Front.sahm', compact('saham'));
    }
    public function contact()
    {
        $title='تماس با ما';
        $description='تماس با ما';
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(Url::route('contact'));
        return view('Front.contact');
    }
    public function tahlilsahm(Saham $saham)
    {
        $title=isset($saham->title) ? $saham->title : $saham->name;
        $description=isset($saham->description) ? $saham->description : Str::limit(strip_tags($saham->content),250);
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(Url::full());

        $sahm = $saham;
        $posts = Tahlilsahme::where('active', '1')->orderby('created_at', 'DESC')->paginate(10);
        return view('Front.saham', compact(['sahm', 'posts']));
    }
    public function tahlil(Tahlilsahme $tahlilsahme)
    {
        $title=isset($tahlilsahme->title) ? $tahlilsahme->title : $tahlilsahme->name;
        $description=isset($tahlilsahme->description) ? $tahlilsahme->description : Str::limit(strip_tags($tahlilsahme->content),250);
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(Url::full());

        $sahm = $tahlilsahme;
        $posts = Tahlilsahme::where('active', '1')->orderby('created_at', 'DESC')->paginate(10);
        return view('Front.sahms', compact(['sahm', 'posts']));
    }
    public function courses()
    {
        $title='لیست دوره ها';
        $description='لیست دوره ها';
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(Url::route('courses'));

        $vipcats = Term::where('vip', '1')->get();
        $terms = Term::where('access', '1')->latest()->get();
        $mainpage = MainPage::first();
        return view('Front.courses', compact(['vipcats', 'terms',  'mainpage']));
    }
    public function catsaham(Category $category)
    {
        $title=isset($category->title) ? $category->title : $category->name;
        $description=isset($category->description) ? $category->description :  Str::limit(strip_tags($category->content),250);
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(Url::full());

        $sahm = $category;
        $sahams = $sahm->sahams()->get();
        return view('Front.categorysaham', compact(['sahm', 'sahams']));
    }
    public function catblog1(Category $category)
    {
        $cats=$category->child()->get();
        $categories = $category->descendants()->add($category)->pluck('id');
        $posts = Post::whereHas('category', function ($query) use ($categories) {
            return $query->whereIn('id', $categories);
        })->paginate(10);
        return view('Front.catblog', compact(['posts']));
    }
    public function subscription()
    {
        return view('Front.subs');
    }

    public function comment(Request $request)
    {
        $validData = $request->validate([
            'commentable_id' => 'required',
            'commentable_type' => 'required',
            'parent_id' => 'required',
            'comment' => 'required',
            'name'=>'nullable',
            'email'=>'nullable'
        ]);
        if($validData['parent_id']!=0)
        {
            Comment::where('parent_id',$validData['parent_id'])->delete();
            $validData['approved']= 1;
        }


        if(auth()->check())
        {
        $validData['user_id']= auth()->user()->id;
        }
        Comment::create($validData);
        alert()->success('   نظر شما با موفقیت ثبت شد و پس از تایید در وب سایت نمایش داده می شود', 'پیغام سیستم')->persistent("تایید");
        return back();
    }
    public function videos()
    {
        $url = Storage::disk('s3')->temporaryUrl(
            'restapi-restful.mp4',
            now()->addMinutes(50),
            [
                'ResponseContentType' => 'application/octet-stream',
            ]
        );
        return view('Front.video', compact('url'));
    }

    public function termtak(Term $term)
    {
        $title=isset($term->onvan) ? $term->onvan : $term->title;
        $description=isset($term->description) ? $term->description : Str::limit(strip_tags($term->content),250);
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(Url::full());

        return view('Front.term', compact('term'));
    }
    public function termtak2(Term $term)
    {
        $title=isset($term->onvan) ? $term->onvan : $term->title;
        $description=isset($term->description) ? $term->description : Str::limit(strip_tags($term->content),250);
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(Url::full());

        return view('Front.single-term', compact('term'));
    }
    public function purchase(Term $term, Request $request)
    {

        if (auth()->check()) {
            if (!auth()->user()->order()->where('term_id', $term->id)->where('status', 1)->count()) {

$price=$term->price;
if( discookie() and discookie()->terms->where('id',$term->id)->count())
{
    $price=($term->price*discookie()->percent)/100;
}

               

            if (auth()->user()->allowWithdraw($price)) {
      
                $res = auth()->user()->transactions()->create([
                    'type' => 'debit',
                    'amount' => $price,
                    'status' => '1',
                    'walletable_type'=>get_class($term),
                    'walletable_id'=> $term->id,
                    'description'=>'wallet',
                    'agent'=> refcookie(),
                ]);
                $order = auth()->user()->order()->create([
                    'resnumber' => $res->id,
                    'term_id' => $term->id,
                    'price' => $price,
                    'status' => 1,
                    'description'=>'wallet',
                    'expire_support' =>now()->addDays($term->sup_day),
                    'agent'=>refcookie()
                ]);
               
                event(new \App\Events\TermChannel($term, auth()->user(),$res));
                auth()->user()->notify(new SendTermSuccess($order->term));


                alert()->success(' پرداخت شما موفقیت آمیز بود   ', 'پیغام سیستم')->persistent("تایید");
                return redirect(route('panel.order',$term->slug));
            } else {

                $invoice = (new Invoice)->amount($price-auth()->user()->balance());
                $res = auth()->user()->transactions()->create([
                    'type' => 'credit',
                    'amount' => $price-auth()->user()->balance(),
                    'status' => '0',
                    'walletable_type'=>get_class($term),
                    'walletable_id'=> $term->id,
                    'description'=>' خرید نقدی دوره '.$term->title,
                ]);

                return ShetabitPayment::via($term->bank)->callbackUrl(route('payment.callback'))->purchase($invoice, function ($driver, $transactionId) use ($term, $invoice, $res) {

                    $res->update([
                        'resnumber' => $transactionId,
                    ]);
                })->pay()->render();
            }
        }
        else
        {
            alert()->success(' شما قبلا در این دوره ثبت نام کرده اید ', 'پیغام سیستم')->persistent("تایید");
            return redirect(route('panel.order',$term->slug));
        }

    } else {
            session()->put('route', 'term.purchase');
            session()->put('value',$term->slug);
            session()->put('type', 'purchase');
            return redirect(route('register'));
        }
    }
    public function callback(Request $request)
    {
        try {
            $res = Wallet::where('resnumber', $request->Authority)->firstOrFail();
            $price = $res->amount;
            // $payment->order->price
            $receipt = ShetabitPayment::via($res->walletable->bank)->amount($price)->transactionId($request->Authority)->verify();
            $res->update([
                'status' => 1
            ]);
            $price=$res->walletable->price;
            if(discookie() and discookie()->terms->where('id',$res->walletable->id)->count())
            {
                $price=($res->walletable->price*discookie()->percent)/100;
            }
            $result = auth()->user()->transactions()->create([
                'type' => 'debit',
                'amount' => $price,
                'status' => '1',
                'walletable_type'=>$res->walletable_type,
                'walletable_id'=> $res->walletable->id,
                'description'=>'wallet',
                'parent'=>$res->id,
            ]);
            $order = auth()->user()->order()->create([
                'resnumber' => $result->id,
                'term_id' => $res->walletable->id,
                'price' => $price,
                'status' => 1,
                'description'=>'online-wallet',
                'expire_support' =>now()->addDays($res->walletable->sup_day),
                'agent'=>refcookie()
            ]);
           if(refcookie())
           {
            event(new \App\Events\UserReferred(refcookie(), auth()->user(),$order,$res));
           }
            event(new \App\Events\TermChannel($order->term, auth()->user(),$res));
            auth()->user()->notify(new SendTermSuccess($order->term));
            if($order->price==$order->term->Orginalprice())
            {
            auth()->user()->transactions()->create([
                'type' => 'credit',
                'amount' => $order->term->gift,
                'status' => '1',
                'walletable_type'=>$res->walletable_type,
                'walletable_id'=> $order->term->id,
                'description'=>'wallet',
            ]);
            }
            alert()->success(' پرداخت شما موفقیت آمیز بود   ', 'پیغام سیستم')->persistent("تایید");
            session()->forget('dataurl');
            return redirect(route('panel.order',$res->walletable->slug));
        } catch (InvalidPaymentException $exception) {
            alert()->error($exception->getMessage())->persistent("تایید");
            return redirect(route('panel.index'));
        }
    }
    public function landing()
    {
        session()->put('route', 'term.purchase');
        session()->put('value','cryptocurrency-Money-Making-Course');
        session()->put('type', 'purchase');
        return view('Front.landing');
    }
    public function landing2()
    {
        $mainpage=MainPage::first();
        return view('Front.landing2',compact('mainpage'));
    }
    public function landing3()
    {
        $mainpage=MainPage::first();
        return view('Front.landing.landing3',compact('mainpage'));
    }
    public function landing3video()
    {
        $term=Term::find(32);
      
$now = Carbon::now();
$date = Carbon::parse('2022-04-20 00:00:00');
$diff = $date->diffInSeconds($now);
        return view('Front.landing.alfavideo',compact('term','diff'));
    }
    public function aboutus()
    {
        $post=Post::where('slug','about-us')->first();
        $title=isset($post->title) ? $post->title : $post->name;
        $description=isset($post->description) ? $post->description : $post->content;
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(Url::full());
        return view('Front.about-us', compact(['post']));
    }
    public function websiteguide()
    {
        $post=Post::where('slug','website-guide')->first();
        $title=isset($post->title) ? $post->title : $post->name;
        $description=isset($post->description) ? $post->description : $post->content;
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::setCanonical(Url::full());
        return view('Front.website-guide', compact(['post']));
    }
    public function arzedigital(Arzedigital $arzedigital)
    {
        $real=$arzedigital->realtimechart;
        $arzes=Arzedigital::where('active',1)->get();
        return view('Front.realtimechart',compact('real','arzes'));
    }
    public function video(Term $term, Video $video)
    {
        $next = $video->next();
        $previous = $video->previous();
        $termcat = $term->termcats()->get();
        return view('Front.video', compact(['term', 'video','next','previous','termcat']));
    }

  
}
