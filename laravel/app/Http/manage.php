<?php

use App\Models\Discount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

if(! function_exists('Activemenu'))
{

    function Activemenu($parent,$routename,$panel)
    {
        $counts=\App\Models\MenuAdmin::where('panel',$panel)->where('route',$routename)->first();
        if($counts)
        {

            if($counts->parent==$parent)
            {
              return 'class="open active conditional-bg"';
            }
        }

    }
}
if(! function_exists('yesno'))
{

    function yesno($value)
    {
       if($value==1)
       {
           return 'بله';
       }
            return 'خیر';

    }
}
if(! function_exists('faTOen'))
{
    function faTOen($string) {
        return strtr($string, array('۰'=>'0', '۱'=>'1', '۲'=>'2', '۳'=>'3', '۴'=>'4', '۵'=>'5', '۶'=>'6', '۷'=>'7', '۸'=>'8', '۹'=>'9', '٠'=>'0', '١'=>'1', '٢'=>'2', '٣'=>'3', '٤'=>'4', '٥'=>'5', '٦'=>'6', '٧'=>'7', '٨'=>'8', '٩'=>'9'));
    }
}
if(! function_exists('ticket_status'))
{

    function ticket_status($value)
    {
       if($value==1)
       {
           return 'پاسخ داده شده است';
       }
       if($value==0)
       {
           return 'منتظر پاسخ پشتیبانی';
       }

    }
}
if(! function_exists('subscription'))
{

    function subscription($value)
    {
       if($value==1)
       {
           return 'پاسخ داده شده است';
       }
       if($value==0)
       {
           return 'منتظر پاسخ پشتیبانی';
       }

    }
}
    if(! function_exists('refcookie'))
{

    function refcookie()
    {
        if (request()->has('ref')){
           
            $referral = User::whereRefcode(request()->get('ref'))->whereType('agent')->first();
            Cookie::queue('refellar', $referral->id, 43200);
            return $referral->id;
        }
        if (Cookie::get('refellar') !== null)
        {
            return Cookie::get('refellar');
        }
        return false;
    
    }
}
if(! function_exists('discookie'))
{

    function discookie()
    {
        if (request()->has('discount')){
           
            $dis=Discount::whereCode(request()->get('discount'))->first();
            Cookie::queue('discount', $dis->code, 43200);
            return $dis;
        }
        if (Cookie::get('discount') !== null)
        {
            $dis=Discount::whereCode(Cookie::get('discount'))->first();
            if(!empty($dis))
            {
            return $dis;
            }
        }
        return false;
    
    }
}
if(! function_exists('shorturlinstallment'))
{

    function shorturlinstallment($wallet)
    {

        $builder = new \AshAllenDesign\ShortURL\Classes\Builder();
        $shortURLObject = $builder->destinationUrl(route('walletdirect',[$wallet->code]). '?ref=' . $wallet->agents->refcode)->make();
        $shortURL = $shortURLObject->url_key;
        return $shortURL;
    }
}

