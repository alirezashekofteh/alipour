@extends('Front.Layouts.master')
@section('title' , 'alireza')
@section('content')
    <section class="container mt-5">
        <div class="row">
     @include('Front.Panel.sidebar')
            <div class="col-lg-8">
                <div class="box p-md-4 p-2">
                    <div id="owl-slider" class="owl-carousel mb-4 ">
                        <div class="item">
                            <img src="/Images/Slides/Slide-1.jpg" alt="slide1" class="img-fluid rad25" />
                            <div class="caption"><p>طراحی شده به صورت ریسپانسیو و واکنشگرا</p></div>
                        </div>

                        <div class="item">
                            <img src="/Images/Slides/Slide-2.jpg" alt="slide2" class="img-fluid rad25" />
                            <div class="caption"><p>طراحی استاندارد و کاربر پسند</p></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="wizard card-like  m-3">
                                <form action="#">
                                    <div class="wizard-header">
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <h5 class="IRANSansWeb_Medium mb-1">
                                                    انتخاب زمان نوبت :
                                                </h5>

                                                <p>
                                                    لطفا زمان نوبت دلخواه خود را از بین نوبت‌های خالی انتخاب نمایید
                                                </p>

                                                <hr class="pb-3" />
                                                <div class="steps text-center">
                                                    <div class="wizard-step active"></div>
                                                    <div class="wizard-step"></div>
                                                    <div class="wizard-step"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-body">
                                        <div class="step initial active">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <select id="datacenter" class="custom-select">
                                                        <option value="F_1" selected="selected">فروردین</option>
                                                        <option value="O_2">اردیبهشت</option>
                                                        <option value="Kh_3">خرداد</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <select id="desktoptype" class="custom-select">
                                                        <option value="xf_1" data-available-with="F_1" selected="selected">چهار شنبه 1398/1/17</option>
                                                        <option value="xf_2" data-available-with="F_1">پنج شنبه 1398/1/18</option>
                                                        <option value="xf_3" data-available-with="F_1">شنبه 1398/1/19</option>
                                                        <option value="xf_4" data-available-with="F_1">یکشنبه 1398/1/20</option>

                                                        <option value="xo_2" data-available-with="O_2"> شنبه 1398/2/6</option>
                                                        <option value="xo_3" data-available-with="O_2">یک شنبه 1398/2/8</option>
                                                        <option value="xo_4" data-available-with="O_2"> دوشنبه 1398/2/12</option>
                                                        <option value="xo_5" data-available-with="O_2">سه شنبه 1398/2/16</option>

                                                        <option value="d_1" data-available-with="Kh_3">سه شنبه 1398/3/19</option>
                                                        <option value="d_2" data-available-with="Kh_3">یکشنبه 1398/3/20</option>
                                                        <option value="d_3" data-available-with="Kh_3">چهار شنبه 1398/3/17</option>
                                                        <option value="d_4" data-available-with="Kh_3">پنج شنبه 1398/3/18</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <select id="os" class="custom-select">
                                                        <option value="t_1" data-available-with="xo_2,xo_4,xf_1,xf_2,d_1,d_2,d_4" selected="selected">30 : 16</option>
                                                        <option value="t_2" data-available-with="xo_3,xo_2,xf_3,xf_1,d_3,xf_2,d_2">00 : 17</option>
                                                        <option value="t_3" data-available-with="xo_4,xf_1,d_1,d_2,d_4,xo_1,d_3">30 : 18</option>
                                                        <option value="t_4" data-available-with="xo_5,xf_1,xf_4,d_4,xo_2,xf_3,d_2">00 : 19</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="step">
                                            <div class="row">
                                                <div class="col-sm-12 mb-3">
                                                    <div class="icheck-info form-check-inline">
                                                        <input type="radio" checked id="primary1" name="primary" />
                                                        <label for="primary1">آقا</label>
                                                    </div>
                                                    <div class="icheck-info form-check-inline">
                                                        <input type="radio" id="primary2" name="primary" />
                                                        <label for="primary2">خانم</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="firstname" placeholder="نـام">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="lastname" placeholder="نام خانوادگی">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="email" placeholder="کد ملی">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="tel" class="form-control" id="repeatEmail" placeholder="شماره موبایل">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="step">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h5 class="IRANSansWeb_Medium">قوانین و مقررات :</h5>
                                                    <p class="text-justify">
                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                                                    </p>
                                                    <div class="icheck-info">
                                                        <input type="checkbox" id="checkbox1" name="checkboxrule" />
                                                        <label for="checkbox1">قوانین و مقررات را می پذیرم</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="wizard-footer">
                                        <div class="row">
                                            <div class="col-sm-6  text-sm-right text-center mb-2">
                                                <button id="wizard-prev" style="display:none" type="button" class="btn btn-info">
                                                    مرحله قبلی
                                                </button>
                                            </div>
                                            <div class="col-sm-6 text-sm-left text-center mb-2">
                                                <button id="wizard-next" type="button" class="btn btn-danger">
                                                    مرحله بعدی
                                                </button>
                                            </div>
                                            <div class="col-sm-12 text-sm-left text-center mb-2">
                                                <button id="wizard-subm" style="display:none" type="button" class="btn btn-danger">
                                                    دریافت نوبت
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <h6 class="IRANSansWeb_Medium bt-color  bg-light py-2 px-3 my-4 rad25">مقالات ارسالی</h6>
                    <div class="row px-md-3 grad-hover">
                        <div class="col-lg-3 col-sm-6">
                            <a href="#">
                                <img src="/Images/topblog2.jpg" class="img-fluid p-2 rounded" />
                                <p class="text-center">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <a href="#">
                                <img src="/Images/topblog8.jpg" class="img-fluid p-2 rounded" />
                                <p class="text-center">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <a href="#">
                                <img src="/Images/topblog13.jpg" class="img-fluid p-2 rounded" />
                                <p class="text-center">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <a href="#">
                                <img src="/Images/topblog6.jpg" class="img-fluid p-2 rounded" />
                                <p class="text-center">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('js-page')
<script src="/Js/jquery.chainedTo.min.js"></script>
<script>
    $("#desktoptype").chainedTo("#datacenter");
    $("#os").chainedTo("#datacenter,#desktoptype");
    $("#bu").chainedTo("#datacenter,#desktoptype,#os");

</script>
<script>
    $(document).ready(function () {
        // Checking button status ( wether or not next/previous and
        // submit should be displayed )
        const checkButtons = (activeStep, stepsCount) => {
            const prevBtn = $("#wizard-prev");
            const nextBtn = $("#wizard-next");
            const submBtn = $("#wizard-subm");

            switch (activeStep / stepsCount) {
                case 0: // First Step
                    prevBtn.hide();
                    submBtn.hide();
                    nextBtn.show();
                    break;
                case 1: // Last Step
                    nextBtn.hide();
                    prevBtn.show();
                    submBtn.show();
                    break;
                default:
                    submBtn.hide();
                    prevBtn.show();
                    nextBtn.show();
            }
        };

        // Scrolling the form to the middle of the screen if the form
        // is taller than the viewHeight
        const scrollWindow = (activeStepHeight, viewHeight) => {
            if (viewHeight < activeStepHeight) {
                $(window).scrollTop($(steps[activeStep]).offset().top - viewHeight / 2);
            }
        };

        // Setting the wizard body height, this is needed because
        // the steps inside of the body have position: absolute
        const setWizardHeight = activeStepHeight => {
            $(".wizard-body").height(activeStepHeight);
        };

        $(function () {
            // Form step counter (little cirecles at the top of the form)
            const wizardSteps = $(".wizard-header .wizard-step");
            // Form steps (actual steps)
            const steps = $(".wizard-body .step");
            // Number of steps (counting from 0)
            const stepsCount = steps.length - 1;
            // Screen Height
            const viewHeight = $(window).height();
            // Current step being shown (counting from 0)
            let activeStep = 0;
            // Height of the current step
            let activeStepHeight = $(steps[activeStep]).height();

            checkButtons(activeStep, stepsCount);
            setWizardHeight(activeStepHeight);

            // Resizing wizard body when the viewport changes
            $(window).resize(function () {
                setWizardHeight($(steps[activeStep]).height());
            });

            // Previous button handler
            $("#wizard-prev").click(() => {
                // Sliding out current step
                $(steps[activeStep]).removeClass("active");
                $(wizardSteps[activeStep]).removeClass("active");

                activeStep--;

                // Sliding in previous Step
                $(steps[activeStep]).removeClass("off").addClass("active");
                $(wizardSteps[activeStep]).addClass("active");

                activeStepHeight = $(steps[activeStep]).height();
                setWizardHeight(activeStepHeight);
                checkButtons(activeStep, stepsCount);
            });

            // Next button handler
            $("#wizard-next").click(() => {
                // Sliding out current step
                $(steps[activeStep]).removeClass("inital").addClass("off").removeClass("active");
                $(wizardSteps[activeStep]).removeClass("active");

                // Next step
                activeStep++;

                // Sliding in next step
                $(steps[activeStep]).addClass("active");
                $(wizardSteps[activeStep]).addClass("active");

                activeStepHeight = $(steps[activeStep]).height();
                setWizardHeight(activeStepHeight);
                checkButtons(activeStep, stepsCount);
            });
        });
    });
        </script>
@endsection
