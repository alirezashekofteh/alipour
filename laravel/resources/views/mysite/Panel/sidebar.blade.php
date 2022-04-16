<div class="col-lg-4">
    <div>
        <div class="my-2 box grad-bg p-4">
            <div class="row rounded text-sm-right text-center pt-3">
                <div class="col-lg-4 col-sm-3">
                    <a href="#">
                        <img src="/Images/pic.png" class="img-fluid rounded-circle mb-md-0 mb-3" />
                    </a>
                </div>
                <div class="col-lg-8 col-sm-9 pr-3">
                    <div id="bio" class="text-white">
                        <h5 class="IRANSansWeb_Medium bt-color">{{ Auth::user()->name }}</h5>
                        <p class="">{{Auth::user()->email}}</p>
                        <span>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                    </span>
                        <p>11 سال تجربه</p>
                    </div>
                </div>


            </div>

        </div>
        <div class="my-2 box p-4">
            <h6 class="IRANSansWeb_Medium grad-bg text-white py-2 px-3 rad25">سوابق تحصیلی</h6>
            <ul class="prof">
                <li>
                    <p>

                       <a href="{{route('panel.profile')}}" class="nav-links"> <i class="fas fa-arrow-alt-circle-left text-success"></i> ویرایش پروفایل</a>
                    </p>
                </li>
                <li>
                    <p>
                        <i class="fas fa-arrow-alt-circle-left text-success"></i>
                        کارشناسی ارشد دانشگاه علامه
                    </p>
                </li>
                <li>
                    <p>
                        <i class="fas fa-arrow-alt-circle-left text-success"></i>
                        دکترای دانشگاه طباطبایی
                    </p>
                </li>
                <li>
                    <p>
                        <i class="fas fa-arrow-alt-circle-left text-success"></i>
                        کارشناسی دانشگاه شهيد بهشتي
                    </p>
                </li>
            </ul>
        </div>
        <div class="my-2 box p-4">
            <h6 class="IRANSansWeb_Medium bt-color  bg-light py-2 px-3 rad25">سوابق علمی</h6>
            <ul class="prof">
                <li>
                    <p>
                        <i class="fas fa-arrow-alt-circle-left text-success"></i>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                    </p>
                </li>
                <li>
                    <p>
                        <i class="fas fa-arrow-alt-circle-left text-success"></i>
                        لورم ایپسوم متن ساختگی با تولید
                    </p>
                </li>
                <li>
                    <p>
                        <i class="fas fa-arrow-alt-circle-left text-success"></i>
                        ساختگی با تولید سادگی نامفهوم از صنعت
                    </p>
                </li>
                <li>
                    <p>
                        <i class="fas fa-arrow-alt-circle-left text-success"></i>
                        متن ساختگی با تولید سادگی نامفهوم
                    </p>
                </li>
            </ul>

        </div>


        <div class="m-2 box p-4">
            <h6 class="IRANSansWeb_Medium bt-color bg-light py-2 px-3 mb-4 rad25">شبکه های اجتماعی</h6>

            <a href="#" target="_blank">
                <img class="socialsize" src="/Images/Svg/telegram.png" alt="">
            </a>
            <a href="#" target="_blank">
                <img class="socialsize" src="/Images/Svg/Instagram.png" alt="">
            </a>
            <a href="#" target="_blank">
                <img class="socialsize" src="/Images/Svg/whatsapp-tile.svg" alt="">
            </a>


        </div>

        <div class="my-2 box p-4">
            <h6 class="IRANSansWeb_Medium bt-color  bg-light py-2 px-3 rad25">اطلاعات تماس</h6>

            <p>
                <span class="IRANSansWeb_Medium"><i class="fas fa-map-marker-alt text-success ml-2"></i>آدرس :</span>
                تهران- انتهای بزرگراه صیاد شیرازی شمال- خیابان صنایع- ساختمان ساسان- پلاک 9- طبقه 4- واحد402
            </p>
            <p>
                <span class="IRANSansWeb_Medium"><i class="fas fa-phone text-success ml-2"></i>تلفن تماس :</span>
                01733256458 - 091236547896
            </p>
            <p>
                <span class="IRANSansWeb_Medium"><i class="fas fa-calendar-day text-success ml-2"></i>روزهای حضور:</span>
                روزهاي زوج از ساعت 16 به بعد
            </p>

            <div>
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12774.829017508442!2d54.45043830606862!3d36.825534354768585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f83350603b80477%3A0xe866c27a957782c!2sClinic+noor+golestan!5e0!3m2!1sen!2sua!4v1565897527166!5m2!1sen!2sua" frameborder="0" style="border:0;width:100%" allowfullscreen></iframe>
            </div>

        </div>

    </div>

</div>
