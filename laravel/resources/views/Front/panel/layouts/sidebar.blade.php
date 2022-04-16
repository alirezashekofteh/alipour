<div class="col-lg-3 col-md-3 col-xs-12 order-2 pr">
    <div class="sidebar-profile sidebar-navigation">
        <section class="profile-box">
            <header class="profile-box-header-inline">
                <div class="profile-avatar user-avatar profile-img">
                    <img src="{{ Auth::user()->pic }}">
                </div>
            </header>
            <footer class="profile-box-content-footer">
                <span class="profile-box-nameuser">{{ Auth::user()->nf  }}</span>
                <span class="profile-box-registery-date">عضویت در سایت : {{jdate(Auth::user()->created_at)->ago()}}</span>
                <span class="profile-box-phone">تلفن همراه : {{ Auth::user()->mobile }}</span>
                <span class="profile-box-nameuser d-block mb-3">موجودی کیف پول : {{number_format(Auth::user()->balance())}}تومان</span>
                @if (auth()->user()->expire_at > Carbon\Carbon::now())
<div class="alert alert-success"><span>{{jdate(auth()->user()->expire_at)->ago()}}</span> از اشتراک شما باقی مانده است</div>
                @endif


            </footer>
        </section>
        <section class="profile-box">
            <ul class="profile-account-navs">
                <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="{{route('panel.profile')}}"
                    @if (url()->current()==route('panel.profile'))
                    class="active"
                    @endif
                    ><i class="mdi mdi-account-outline"></i>
                        پروفایل
                    </a>
                </li>
                <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="{{route('panel.chargewallet')}}"
                    @if (url()->current()==route('panel.chargewallet'))
                        class="active"
                        @endif><i class="mdi mdi-cart"></i>
                      افزایش کیف پول
                    </a>
                </li>
                <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="{{route('panel.orders')}}"
                    @if (url()->current()==route('panel.orders'))
                        class="active"
                        @endif><i class="mdi mdi-cart"></i>
                       لیست دوره های شما
                    </a>
                </li>
                <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="{{route('panel.channel')}}"
                    @if (url()->current()==route('panel.channel'))
                        class="active"
                        @endif><i class="mdi mdi-cart"></i>
                      لیست کانال
                    </a>
                </li>
                {{-- <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="{{route('panel.subscription')}}"
                    @if (url()->current()==route('panel.subscription'))
                        class="active"
                        @endif><i class="mdi mdi-cart"></i>
                     خرید اشتراک
                    </a>
                </li> --}}
                <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="{{route('panel.installments')}}"
                    @if (url()->current()==route('panel.installments'))
                        class="active"
                        @endif><i class="mdi mdi-cart"></i>
                    اقساط پرداخت نشده
                    </a>
                </li>
                <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="{{route('panel.tickets')}}"  @if (url()->current()==route('panel.tickets'))
                        class="active"
                        @endif><i class="mdi mdi-heart"></i>
                       تیکت ها
                    </a>
                </li>
                <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="{{route('panel.new.ticket')}}" @if (url()->current()==route('panel.new.ticket'))
                        class="active"
                        @endif><i class="mdi mdi-map-outline"></i>
                       ارسال تیکت جدید
                    </a>
                </li>
                <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="https://new.rezaderakhshi.com/blog/agreement" target="_blank"
                    @if (url()->current()=='https://new.rezaderakhshi.com/blog/agreement')
                        class="active"
                        @endif><i class="mdi mdi-cart"></i>
                     توافق نامه
                    </a>
                </li>
                <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="{{route('panel.setting')}}" 
                    @if (url()->current()==route('panel.setting'))
                        class="active"
                        @endif><i class="mdi mdi-cart"></i>
                    تنظیمات
                    </a>
                </li>
                @if (auth()->user()->type=='agent')
                <hr>
                <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="{{route('panel.agent.link')}}" 
                    @if (url()->current()==route('panel.agent.link'))
                        class="active"
                        @endif><i class="mdi mdi-cart"></i>
                    لینک های بازاریابی
                    </a>
                </li> 
                <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="{{route('panel.agent.termsalemobile')}}" 
                    @if (url()->current()==route('panel.agent.termsalemobile'))
                        class="active"
                        @endif><i class="mdi mdi-cart"></i>
                  ثبت فروش قسطی
                    </a>
                </li> 
                <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="{{route('panel.agent.wallet')}}" 
                    @if (url()->current()==route('panel.agent.wallet'))
                        class="active"
                        @endif><i class="mdi mdi-cart"></i>
                 لیست سود های واریزی
                    </a>
                </li> 
                <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="{{route('panel.agent.installment')}}" 
                    @if (url()->current()==route('panel.agent.installment'))
                        class="active"
                        @endif><i class="mdi mdi-cart"></i>
                پیگیری اقساط پرداخت نشده
                    </a>
                </li> 
                <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="{{route('panel.agent.estelam')}}" 
                    @if (url()->current()==route('panel.agent.estelam'))
                        class="active"
                        @endif><i class="mdi mdi-cart"></i>
              استعلام وضعیت کاربر
                    </a>
                </li> 
                @endif
                <li class="profile-account-nav-item navigation-link-dashboard">
                    <a href="#" class=""><i class="mdi mdi-email-open-outline"></i>
                        خروج از پنل کاربری
                    </a>
                </li>

            </ul>
        </section>
        {{-- <section class="widget-product-categories">
            <header class="cat-header">
                <h2 class="mb-0">
                    <button class="btn btn-block text-right collapsed" data-toggle="collapse" href="#headingTwo" role="button" aria-expanded="false" aria-controls="headingTwo">
                         برند ها
                    <i class="mdi mdi-chevron-down"></i>
                    </button>
                </h2>
            </header>
            <div class="product-filter">
                <div class="card">
                    <div class="collapse" id="headingTwo" style="">
                        <div class="card-main mb-0">
                            <div class="form-auth-row">
                                <label for="#" class="ui-checkbox">
                                    <input type="checkbox" value="1" name="login" id="remember">
                                    <span class="ui-checkbox-check"></span>
                                </label>
                                <label for="remember" class="remember-me">سامسونگ</label>
                            </div>
                            <div class="form-auth-row">
                                <label for="#" class="ui-checkbox">
                                    <input type="checkbox" value="1" name="login" id="remember">
                                    <span class="ui-checkbox-check"></span>
                                </label>
                                <label for="remember" class="remember-me">اپل</label>
                            </div>
                            <div class="form-auth-row">
                                <label for="#" class="ui-checkbox">
                                    <input type="checkbox" value="1" name="login" id="remember">
                                    <span class="ui-checkbox-check"></span>
                                </label>
                                <label for="remember" class="remember-me">نوکیا</label>
                            </div>
                            <div class="form-auth-row">
                                <label for="#" class="ui-checkbox">
                                    <input type="checkbox" value="1" name="login" id="remember">
                                    <span class="ui-checkbox-check"></span>
                                </label>
                                <label for="remember" class="remember-me">هواوی</label>
                            </div>
                            <div class="form-auth-row">
                                <label for="#" class="ui-checkbox">
                                    <input type="checkbox" value="1" name="login" id="remember">
                                    <span class="ui-checkbox-check"></span>
                                </label>
                                <label for="remember" class="remember-me">شیایومی</label>
                            </div>
                            <div class="form-auth-row">
                                <label for="#" class="ui-checkbox">
                                    <input type="checkbox" value="1" name="login" id="remember">
                                    <span class="ui-checkbox-check"></span>
                                </label>
                                <label for="remember" class="remember-me">ال جی</label>
                            </div>
                            <div class="form-auth-row">
                                <label for="#" class="ui-checkbox">
                                    <input type="checkbox" value="1" name="login" id="remember">
                                    <span class="ui-checkbox-check"></span>
                                </label>
                                <label for="remember" class="remember-me">سونی</label>
                            </div>
                            <div class="form-auth-row">
                                <label for="#" class="ui-checkbox">
                                    <input type="checkbox" value="1" name="login" id="remember">
                                    <span class="ui-checkbox-check"></span>
                                </label>
                                <label for="remember" class="remember-me">اچ تی سی</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    </div>
</div>
