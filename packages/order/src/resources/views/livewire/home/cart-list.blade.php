<div>
    <section class="s-about-us-top">
        <div class="bg-dark-opacity"></div>
        <div class="prs-responsive">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-11 m-auto-x page-about-us-top">
                        <h1 class="title-fa">سبد خرید</h1>
                        <div class="addressBarBasket">
                            <div class="r">
                                <svg width="21" height="25" viewBox="0 0 25.296 29.863">
                                    <g id="Location" transform="translate(0.781 0.75)">
                                        <path id="Path_1011" data-name="Path 1011"
                                              d="M1.169,15.132a17.588,17.588,0,0,0,4.567,8.9,28.7,28.7,0,0,0,6.048,4.983,2,2,0,0,0,2.168,0A28.7,28.7,0,0,0,20,24.035a17.588,17.588,0,0,0,4.567-8.9,13.5,13.5,0,0,0-1.831-9.238C20.961,3.152,17.842,1,12.867,1S4.773,3.152,3,5.893A13.5,13.5,0,0,0,1.169,15.132Z"
                                              transform="translate(-1 -1)" fill="none" stroke="#fff"
                                              stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                        <circle id="Ellipse_49" data-name="Ellipse 49" cx="4.423" cy="4.423" r="4.423"
                                                transform="translate(16.236 16.425) rotate(180)" fill="none"
                                                stroke="#fff" stroke-width="1.5"/>
                                    </g>
                                </svg>
                                <h6>آکادمی مریم صفایی</h6>
                            </div>
                            <div class="main-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20.318" height="13.491"
                                     viewBox="0 0 20.318 13.491">
                                    <path id="Up_Arrow_2" data-name="Up Arrow 2"
                                          d="M0,5.9,5.9,0m0,0V18.87M5.9,0l5.9,5.9"
                                          transform="translate(0.849 12.642) rotate(-90)" fill="none" stroke="#c49c74"
                                          stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"/>
                                </svg>
                            </div>
                            <a class="active-link-page" href="/cart">سبد خرید آکادمی</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="prs-responsive">
            <div class="container-fluid">
                <div class="row">
                    @if($carts->isNotEmpty())
                        <div class="col-md-11 m-auto-x parentBasketShop">
                            <div class="list-thumbnail-card-shop">
                                @foreach($carts as $cart)
                                    <div class="item-card-shop" x-data="{show : false}">
                                        <div class="right-item-card">
                                            <img class="main-img-card-item"
                                                 src="{{ $cart['post']->files()->where('type' , 1)->first()?->url }}"
                                                 alt="">
                                            <div class="details-cardShop">
                                                <div class="top">
                                                    <i class="icon-circle"></i>
                                                    <h2>{{ $cart['post']->title }}</h2>
                                                </div>
                                                <div class="bottom">
                                                    <span class="title-teacher">مدرس دوره :</span>
                                                    <span class="name-teacher">خانم مریم صفایی</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="left-item-card">
                                            @if((int)$cart['post']->options['offer_price'] > 0)
                                                <div class="price-parent-cardShop">
                                                    <div class="price-after">
                                                        <strong>{{ number_format($cart['post']->options['offer_price']) }}</strong>
                                                        <span>تومان</span>
                                                    </div>
                                                    <div class="price-before">
                                                        <del>{{ number_format($cart['post']->options['price']) }}</del>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="price-parent-cardShop">
                                                    <div class="price-after">
                                                        <strong>{{ number_format($cart['post']->options['price']) }}</strong>
                                                        <span>تومان</span>
                                                    </div>
                                                </div>
                                            @endif

                                            <a class="delete-thumbnail-cardShop" href="#" @click.prevent="show = !show">
                                                <svg id="Delete" width="16" height="20" viewBox="0 0 20 24">
                                                    <path id="Path_890" data-name="Path 890"
                                                          d="M1.37,14.783q.09.4.173.783c.321,1.455.579,2.621.872,3.588a6.134,6.134,0,0,0,1.16,2.378C4.459,22.516,6.017,23,10,23s5.541-.484,6.425-1.468a6.135,6.135,0,0,0,1.16-2.378c.293-.967.55-2.134.872-3.588q.084-.378.173-.783c.778-3.5.264-5.24-.9-6.216a6.349,6.349,0,0,0-2.862-1.193A25.342,25.342,0,0,0,10,7a25.342,25.342,0,0,0-4.866.374A6.349,6.349,0,0,0,2.272,8.567C1.106,9.543.592,11.285,1.37,14.783Z"
                                                          fill="none" stroke="#fff" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"/>
                                                    <path id="Path_891" data-name="Path 891" d="M10,12v6M6,12v6m8-6v6"
                                                          fill="none" stroke="#fff" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"/>
                                                    <path id="Path_892" data-name="Path 892"
                                                          d="M12,2.071a17.065,17.065,0,0,1,7.516,2.073,1,1,0,0,1-1.031,1.714C17.181,5.072,14.456,4,10,4S2.729,5.079,1.54,5.842A1,1,0,0,1,.46,4.158,16.589,16.589,0,0,1,8,2.07V1A1,1,0,0,1,9,0h2a1,1,0,0,1,1,1Z"
                                                          fill="#fff" fill-rule="evenodd"/>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="parent-question-delete-massage" style="display: none" x-show="show"
                                             @click.outside="show = false"
                                             x-transition:enter.duration.500ms
                                             x-transition:leave.duration.400ms>
                                            <div class="d-flex question-delete-massage">
                                                <div>
                                                    <h5 class="mb-0">آیا از حذف
                                                        دوره {{ $cart['post']->title }} از صفر مطمئن
                                                        هستید؟</h5>
                                                </div>
                                                <a href="#" style="color: #cecece;"
                                                   @click.prevent="$wire.deleteItem('{{ $cart['id'] }}')"><i
                                                        class="icon-trash"></i></a>
                                                <a href="#" @click.prevent="show = false"
                                                   style="color: #cecece;"><i
                                                        class="icon-reply"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="parent-shipping-box">
                                <a class="btn-other-courses" href="{{ route('courses.index') }}">
                                    <i class="icon-circle"></i>
                                    خرید دوره های دیگر
                                </a>
                                <div class="shipping-box">
                                    <div class="title-shipping">
                                        <svg width="37" height="30" viewBox="0 0 46.376 39.5">
                                            <g id="Cart_1" data-name="Cart 1" transform="translate(1 1.828)">
                                                <path id="Path_852" data-name="Path 852"
                                                      d="M14.557,1,3,12.557C5.477,32.782,3,35.671,20.336,35.671s14.859-2.889,17.336-23.114L26.114,1"
                                                      transform="translate(1.852 0)" fill="none" stroke="#c49c74"
                                                      stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
                                                <path id="Path_853" data-name="Path 853" d="M1,7H43.376"
                                                      transform="translate(0 5.557)" fill="none" stroke="#c49c74"
                                                      stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
                                                <path id="Path_854" data-name="Path 854" d="M10,11v7.7M17.7,11v7.7"
                                                      transform="translate(8.336 9.262)" fill="none" stroke="#c49c74"
                                                      stroke-linecap="round" stroke-linejoin="round" stroke-width="4"/>
                                            </g>
                                        </svg>
                                        <h2>اطلاعات پرداخت و ادامه خرید</h2>
                                    </div>
                                    <div class="parent-poromo">
                                        <input type="text" placeholder="کد تخفیف (اختیاری)" wire:model="discountCode">
                                        @if($applydiscount)
                                            <a class="btn-code text-danger" href="" wire:click.prevent="cancelDiscount">لغو کد</a>
                                        @else
                                            <a class="btn-code" href="" wire:click.prevent="applyDiscount">اعمال کد</a>
                                        @endif
                                    </div>
                                    <div class="price-box-shipping">
                                        <div class="item-prices">
                                            <span class="title-price-s">جمع کل </span>
                                            <span class="text-price-s">
                                            {{ number_format($SumBasePrice) }}
                                      <small>تومان</small>
                                        </span>
                                        </div>
                                        <div class="item-prices">
                                            <span class="title-price-s"> تخفیف </span>
                                            @if($SumOfferPrice > 0)
                                                <span class="text-price-s">
                                                {{ number_format($SumOfferPrice) }}
                                                <small>تومان</small>
                                            </span>
                                            @else
                                                <span class="text-price-s">
                                                0
                                                <small>تومان</small>
                                            </span>
                                            @endif
                                        </div>
                                        @if($applydiscount)
                                            <div class="item-prices">
                                                <span class="title-price-s">کد تخفیف </span>
                                                    <span class="text-price-s">
                                                {{ number_format($discount->amount) }}
                                                <small>
                                                    @if($discount->is_percent)
                                                        درصد
                                                    @else
                                                        تومان
                                                    @endif
                                                </small>
                                            </span>
                                            </div>
                                        @endif
                                        <div class="item-prices-two">
                                            <span class="title-price-s">مبلغ قابل پرداخت </span>
                                            <span class="text-price-s">
                                                @php
                                                    $totalPrice = $SumBasePrice - $SumOfferPrice - $this->getDiscountAmount()
                                                @endphp
                                            {{ number_format(max($totalPrice, 0)) }}
                                      <small>تومان</small>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="payment-gateway" x-data="{gateWay:'second'}">
                                        @if(count(config('options.ports')) > 0)
                                            <div wire:click="changeType('online')"
                                                 :class="{'active-gateway':gateWay==='first'}"
                                                 @click="gateWay='first'"
                                                 class="box-gateway">
                                                <img width="30px" src="/img/Bank_Melli_Iran_New_Logo.svg" alt="">
                                                <span>درگاه بانکی</span>
                                            </div>
                                        @endif
                                        @if(config('options.atmCart.active'))
                                            <div wire:click="changeType('cart')"
                                                 :class="{'active-gateway':gateWay==='second'}"
                                                 @click="gateWay='second'"
                                                 class="box-gateway">
                                                <svg width="35" height="35" viewBox="0 0 54 54">
                                                    <g id="iPhone_Pro_Max_2" data-name="iPhone Pro Max 2"
                                                       transform="translate(1 1)">
                                                        <path id="Path_1230" data-name="Path 1230"
                                                              d="M1,26A63.256,63.256,0,0,0,2.049,39.243a14.074,14.074,0,0,0,3.5,7.208,14.075,14.075,0,0,0,7.208,3.5A63.268,63.268,0,0,0,26,51a63.268,63.268,0,0,0,13.243-1.049,14.075,14.075,0,0,0,7.208-3.5,14.075,14.075,0,0,0,3.5-7.208A63.268,63.268,0,0,0,51,26a63.268,63.268,0,0,0-1.049-13.243,14.075,14.075,0,0,0-3.5-7.208,14.074,14.074,0,0,0-7.208-3.5A63.256,63.256,0,0,0,26,1,63.257,63.257,0,0,0,12.757,2.049a14.074,14.074,0,0,0-7.208,3.5,14.074,14.074,0,0,0-3.5,7.208A63.257,63.257,0,0,0,1,26Z"
                                                              fill="none" stroke="#646564" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="4"/>
                                                        <path id="Path_1231" data-name="Path 1231"
                                                              d="M8.409,5a3.409,3.409,0,1,0,3.409,3.409A3.409,3.409,0,0,0,8.409,5ZM17.5,5a3.409,3.409,0,1,0,3.409,3.409A3.409,3.409,0,0,0,17.5,5ZM14.091,17.5A3.409,3.409,0,1,1,17.5,20.909,3.409,3.409,0,0,1,14.091,17.5ZM8.409,14.091A3.409,3.409,0,1,0,11.818,17.5,3.409,3.409,0,0,0,8.409,14.091Z"
                                                              transform="translate(5.091 5.091)" fill="#646564"
                                                              fill-rule="evenodd"/>
                                                    </g>
                                                </svg>
                                                <span style="margin-top: 16px !important;">کارت به کارت</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="payment-types">
                                        @if($type == 'online')
                                            @foreach(config('options.ports') as $port)
                                                <label>
                                                    <input type="radio" value="{{ $port }}"
                                                           wire:model.lazy="portSelected">
                                                    {{ __('ports.'.$port) }}
                                                </label>
                                            @endforeach
                                        @else
                                            @foreach(config('options.atmCart.items') as $item)
                                                <div class="d-flex justify-content-between" x-data="{
                                                    copyCard(number) {
                                                        navigator.clipboard.writeText(number);
                                                    }
                                                }">
                                                    <img width="50px" height="50px"
                                                         src="{{ $item['bankInfo']['logo'] }}">
                                                    <p @click="copyCard('{{$item['cartNumber']}}')">
                                                        {{  substr_replace(substr_replace(substr_replace($item['cartNumber'],"-",4 , 0),"-",9 , 0),"-",14 , 0) }}
                                                        <br>
                                                        {{ $item['name'] }}
                                                    </p>

                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <a class="btn-complete-shop" href="" wire:click.prevent="pay()">
                                        تکمیل فرآیند خرید و پرداخت
                                        <svg id="Left" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24">
                                            <path id="Path_1007" data-name="Path 1007"
                                                  d="M1,12a27.833,27.833,0,0,0,.462,5.827A6.193,6.193,0,0,0,3,21a6.193,6.193,0,0,0,3.172,1.54A27.838,27.838,0,0,0,12,23a27.838,27.838,0,0,0,5.827-.462A6.193,6.193,0,0,0,21,21a6.193,6.193,0,0,0,1.54-3.172A27.838,27.838,0,0,0,23,12a27.838,27.838,0,0,0-.462-5.827A6.193,6.193,0,0,0,21,3a6.193,6.193,0,0,0-3.172-1.54A27.833,27.833,0,0,0,12,1a27.833,27.833,0,0,0-5.827.462A6.193,6.193,0,0,0,3,3a6.193,6.193,0,0,0-1.54,3.172A27.833,27.833,0,0,0,1,12Z"
                                                  fill="none" stroke="#fff" stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"/>
                                            <path id="Path_1008" data-name="Path 1008" d="M14,16l-4-4,4-4" fill="none"
                                                  stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="2"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-11 m-auto-x">
                            <div class="basketBoxEmpty">
                                <svg  width="50" height="50" viewBox="0 0 24.404 24.471">
                                    <g id="basket" transform="translate(0.966 1)">
                                        <path id="Path_856" data-name="Path 856" d="M7,6c0,6.81,10.214,6.81,10.214,0" transform="translate(-0.871 -0.893)" fill="none" stroke="#646464" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                        <path id="Path_857" data-name="Path 857" d="M1.691,11.3q-.109.543-.227,1.124c-.976,5.461-.336,7.978,1.176,9.274A7.228,7.228,0,0,0,6.2,23.113a37.365,37.365,0,0,0,6.034.358,37.365,37.365,0,0,0,6.034-.358A7.228,7.228,0,0,0,21.83,21.7c1.512-1.3,2.152-3.813,1.176-9.274q-.118-.581-.227-1.124c-.385-1.917-.7-3.485-1.059-4.8a9.262,9.262,0,0,0-1.495-3.39C19.068,1.672,17.084,1,12.236,1S5.4,1.672,4.245,3.117a9.263,9.263,0,0,0-1.495,3.39C2.392,7.818,2.077,9.386,1.691,11.3Z" transform="translate(-1 -1)" fill="none" stroke="#646464" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                    </g>
                                </svg>
                                <p class="f-8">سبد خرید شما خالی است</p>
                                <a href="{{ route('courses.index') }}" class="btn-list-courses">دوره های آموزشی</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
