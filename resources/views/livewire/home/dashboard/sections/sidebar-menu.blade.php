<div class="sidebar-component" style="width: 28%">
    <div class="sidebar-dashboard">
        <div class="user">
            <img src="{{ user()->files->first()?->url ?? '/images/noPicture.png' }}" alt="">
            <div class="detail-user">
                <h3>{{ user()->fullName() ?? user()->phone ?? user()->email }}، خوش آمدی</h3>
                <span class="date-dashboard">{{ jdate()->format('%A %d %B Y') }}</span>
            </div>
        </div>
        <ul class="list-item-sidebar">
            @if(user()->role_id != 3)
                <li><a href="{{ route('admin.panel') }}">
                        <svg id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="22" height="22">
                            <path
                                d="M23.9,11.437A12,12,0,0,0,0,13a11.878,11.878,0,0,0,3.759,8.712A4.84,4.84,0,0,0,7.113,23H16.88a4.994,4.994,0,0,0,3.509-1.429A11.944,11.944,0,0,0,23.9,11.437Zm-4.909,8.7A3,3,0,0,1,16.88,21H7.113a2.862,2.862,0,0,1-1.981-.741A9.9,9.9,0,0,1,2,13,10.014,10.014,0,0,1,5.338,5.543,9.881,9.881,0,0,1,11.986,3a10.553,10.553,0,0,1,1.174.066,9.994,9.994,0,0,1,5.831,17.076ZM7.807,17.285a1,1,0,0,1-1.4,1.43A8,8,0,0,1,12,5a8.072,8.072,0,0,1,1.143.081,1,1,0,0,1,.847,1.133.989.989,0,0,1-1.133.848,6,6,0,0,0-5.05,10.223Zm12.112-5.428A8.072,8.072,0,0,1,20,13a7.931,7.931,0,0,1-2.408,5.716,1,1,0,0,1-1.4-1.432,5.98,5.98,0,0,0,1.744-5.141,1,1,0,0,1,1.981-.286Zm-5.993.631a2.033,2.033,0,1,1-1.414-1.414l3.781-3.781a1,1,0,1,1,1.414,1.414Z"/>
                        </svg>
                        پنل ادمین</a></li>
            @endif
            <li><a href="{{ route('dashboard.index') }}">
                    <svg id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="22" height="22">
                        <path
                            d="M23.9,11.437A12,12,0,0,0,0,13a11.878,11.878,0,0,0,3.759,8.712A4.84,4.84,0,0,0,7.113,23H16.88a4.994,4.994,0,0,0,3.509-1.429A11.944,11.944,0,0,0,23.9,11.437Zm-4.909,8.7A3,3,0,0,1,16.88,21H7.113a2.862,2.862,0,0,1-1.981-.741A9.9,9.9,0,0,1,2,13,10.014,10.014,0,0,1,5.338,5.543,9.881,9.881,0,0,1,11.986,3a10.553,10.553,0,0,1,1.174.066,9.994,9.994,0,0,1,5.831,17.076ZM7.807,17.285a1,1,0,0,1-1.4,1.43A8,8,0,0,1,12,5a8.072,8.072,0,0,1,1.143.081,1,1,0,0,1,.847,1.133.989.989,0,0,1-1.133.848,6,6,0,0,0-5.05,10.223Zm12.112-5.428A8.072,8.072,0,0,1,20,13a7.931,7.931,0,0,1-2.408,5.716,1,1,0,0,1-1.4-1.432,5.98,5.98,0,0,0,1.744-5.141,1,1,0,0,1,1.981-.286Zm-5.993.631a2.033,2.033,0,1,1-1.414-1.414l3.781-3.781a1,1,0,1,1,1.414,1.414Z"/>
                    </svg>
                    داشبورد</a></li>
            <li><a href="{{ route('dashboard.profile') }}">
                    <svg id="User" xmlns="http://www.w3.org/2000/svg" width="22" height="24"
                         viewBox="0 0 22 24">
                        <path id="Path_1192" data-name="Path 1192"
                              d="M1,19a4.777,4.777,0,0,0,.343,2.079,2.207,2.207,0,0,0,1.174,1.055A10.011,10.011,0,0,0,5.56,22.8c1.405.142,3.185.2,5.44.2s4.035-.055,5.44-.2a10.011,10.011,0,0,0,3.043-.669,2.207,2.207,0,0,0,1.174-1.055A4.776,4.776,0,0,0,21,19a4.776,4.776,0,0,0-.343-2.079,2.207,2.207,0,0,0-1.174-1.055A10.011,10.011,0,0,0,16.44,15.2c-1.405-.142-3.185-.2-5.44-.2s-4.035.055-5.44.2a10.011,10.011,0,0,0-3.043.669,2.207,2.207,0,0,0-1.174,1.055A4.777,4.777,0,0,0,1,19Z"
                              fill="none" stroke="#151515" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2"></path>
                        <circle id="Ellipse_69" data-name="Ellipse 69" cx="5" cy="5" r="5"
                                transform="translate(16 11) rotate(180)" fill="none"
                                stroke="#151515" stroke-width="2"></circle>
                    </svg>
                    پروفایل</a></li>
            <li><a href="{{ route('dashboard.courses') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22"
                         height="22">
                        <g id="_01_align_center" data-name="01 align center">
                            <path
                                d="M24,8.007l-4,2.982V9a3,3,0,0,0-3-3H14.915l-5-5H0V3H9.086l3,3H3A3,3,0,0,0,0,9V24H20V19.011l4,2.982ZM18,22H2V9A1,1,0,0,1,3,8H17a1,1,0,0,1,1,1Zm4-3.993-2-1.491V13.484l2-1.491Z"/>
                        </g>
                    </svg>
                    دوره ها</a></li>
            <li><a href="{{ route('dashboard.transactions') }}">
                    <svg id="Outline" viewBox="0 0 24 24" width="22" height="22">
                        <path
                            d="M16,0H8A5.006,5.006,0,0,0,3,5V23a1,1,0,0,0,1.564.825L6.67,22.386l2.106,1.439a1,1,0,0,0,1.13,0l2.1-1.439,2.1,1.439a1,1,0,0,0,1.131,0l2.1-1.438,2.1,1.437A1,1,0,0,0,21,23V5A5.006,5.006,0,0,0,16,0Zm3,21.1-1.1-.752a1,1,0,0,0-1.132,0l-2.1,1.439-2.1-1.439a1,1,0,0,0-1.131,0l-2.1,1.439-2.1-1.439a1,1,0,0,0-1.129,0L5,21.1V5A3,3,0,0,1,8,2h8a3,3,0,0,1,3,3Z"/>
                        <rect x="7" y="8" width="10" height="2" rx="1"/>
                        <rect x="7" y="12" width="8" height="2" rx="1"/>
                    </svg>
                    تراکنش ها</a></li>
            <li><a href="{{ route('dashboard.orders') }}">
                    <svg id="Outline" viewBox="0 0 24 24" width="22" height="22">
                        <path
                            d="M16,0H8A5.006,5.006,0,0,0,3,5V23a1,1,0,0,0,1.564.825L6.67,22.386l2.106,1.439a1,1,0,0,0,1.13,0l2.1-1.439,2.1,1.439a1,1,0,0,0,1.131,0l2.1-1.438,2.1,1.437A1,1,0,0,0,21,23V5A5.006,5.006,0,0,0,16,0Zm3,21.1-1.1-.752a1,1,0,0,0-1.132,0l-2.1,1.439-2.1-1.439a1,1,0,0,0-1.131,0l-2.1,1.439-2.1-1.439a1,1,0,0,0-1.129,0L5,21.1V5A3,3,0,0,1,8,2h8a3,3,0,0,1,3,3Z"/>
                        <rect x="7" y="8" width="10" height="2" rx="1"/>
                        <rect x="7" y="12" width="8" height="2" rx="1"/>
                    </svg>
                    فاکتور ها</a></li>
            <li><a href="{{ route('dashboard.tickets') }}">
                    <svg id="Outline" viewBox="0 0 24 24" width="22" height="22">
                        <path
                            d="M16,0h-.13a2.02,2.02,0,0,0-1.941,1.532,2,2,0,0,1-3.858,0A2.02,2.02,0,0,0,8.13,0H8A5.006,5.006,0,0,0,3,5V21a3,3,0,0,0,3,3H8.13a2.02,2.02,0,0,0,1.941-1.532,2,2,0,0,1,3.858,0A2.02,2.02,0,0,0,15.87,24H18a3,3,0,0,0,3-3V5A5.006,5.006,0,0,0,16,0Zm2,22-2.143-.063A4,4,0,0,0,8.13,22H6a1,1,0,0,1-1-1V17H7a1,1,0,0,0,0-2H5V5A3,3,0,0,1,8,2l.143.063A4.01,4.01,0,0,0,12,5a4.071,4.071,0,0,0,3.893-3H16a3,3,0,0,1,3,3V15H17a1,1,0,0,0,0,2h2v4A1,1,0,0,1,18,22Z"/>
                        <path d="M13,15H11a1,1,0,0,0,0,2h2a1,1,0,0,0,0-2Z"/>
                    </svg>
                    تیکت ها</a></li>
            <li class="li-exit"><a class="bg-red" href="" wire:click.prevent="logout()">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24"
                         width="22" height="22">
                        <path
                            d="M22.829,9.172,18.95,5.293a1,1,0,0,0-1.414,1.414l3.879,3.879a2.057,2.057,0,0,1,.3.39c-.015,0-.027-.008-.042-.008h0L5.989,11a1,1,0,0,0,0,2h0l15.678-.032c.028,0,.051-.014.078-.016a2,2,0,0,1-.334.462l-3.879,3.879a1,1,0,1,0,1.414,1.414l3.879-3.879a4,4,0,0,0,0-5.656Z"/>
                        <path
                            d="M7,22H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2H7A1,1,0,0,0,7,0H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H7a1,1,0,0,0,0-2Z"/>
                    </svg>
                    خروج</a>
            </li>
        </ul>
    </div>
</div>
<div class="sidebar-mobile">
    <div x-data="{sideMob:false}" class="sidebar-dashboard" :class="{'border-active':sideMob===true}">
        <i :class="{'rotate-icon':sideMob===true}" @click="sideMob=!sideMob" class="icon-down-open"></i>
        <div @click="sideMob=!sideMob" class="user">
            <img src="{{ user()->files->first()?->url ?? '/images/noPicture.png' }}" alt="">
            <div class="detail-user">
                <h3>{{ user()->fullName() ?? user()->phone ?? user()->email }}، خوش آمدی</h3>
                <span class="date-dashboard">{{ jdate()->format('%A %d %B Y') }}</span>
            </div>
        </div>
        <ul  x-show="sideMob" x-transition.scale.50 x-transition.duration.700ms class="list-item-sidebar">
            @if(user()->role_id != 3)
                <li><a href="{{ route('admin.panel') }}">
                        <svg id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="22" height="22">
                            <path
                                d="M23.9,11.437A12,12,0,0,0,0,13a11.878,11.878,0,0,0,3.759,8.712A4.84,4.84,0,0,0,7.113,23H16.88a4.994,4.994,0,0,0,3.509-1.429A11.944,11.944,0,0,0,23.9,11.437Zm-4.909,8.7A3,3,0,0,1,16.88,21H7.113a2.862,2.862,0,0,1-1.981-.741A9.9,9.9,0,0,1,2,13,10.014,10.014,0,0,1,5.338,5.543,9.881,9.881,0,0,1,11.986,3a10.553,10.553,0,0,1,1.174.066,9.994,9.994,0,0,1,5.831,17.076ZM7.807,17.285a1,1,0,0,1-1.4,1.43A8,8,0,0,1,12,5a8.072,8.072,0,0,1,1.143.081,1,1,0,0,1,.847,1.133.989.989,0,0,1-1.133.848,6,6,0,0,0-5.05,10.223Zm12.112-5.428A8.072,8.072,0,0,1,20,13a7.931,7.931,0,0,1-2.408,5.716,1,1,0,0,1-1.4-1.432,5.98,5.98,0,0,0,1.744-5.141,1,1,0,0,1,1.981-.286Zm-5.993.631a2.033,2.033,0,1,1-1.414-1.414l3.781-3.781a1,1,0,1,1,1.414,1.414Z"/>
                        </svg>
                        پنل ادمین</a></li>
            @endif
            <li><a href="{{ route('dashboard.index') }}">
                    <svg id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="22" height="22">
                        <path
                            d="M23.9,11.437A12,12,0,0,0,0,13a11.878,11.878,0,0,0,3.759,8.712A4.84,4.84,0,0,0,7.113,23H16.88a4.994,4.994,0,0,0,3.509-1.429A11.944,11.944,0,0,0,23.9,11.437Zm-4.909,8.7A3,3,0,0,1,16.88,21H7.113a2.862,2.862,0,0,1-1.981-.741A9.9,9.9,0,0,1,2,13,10.014,10.014,0,0,1,5.338,5.543,9.881,9.881,0,0,1,11.986,3a10.553,10.553,0,0,1,1.174.066,9.994,9.994,0,0,1,5.831,17.076ZM7.807,17.285a1,1,0,0,1-1.4,1.43A8,8,0,0,1,12,5a8.072,8.072,0,0,1,1.143.081,1,1,0,0,1,.847,1.133.989.989,0,0,1-1.133.848,6,6,0,0,0-5.05,10.223Zm12.112-5.428A8.072,8.072,0,0,1,20,13a7.931,7.931,0,0,1-2.408,5.716,1,1,0,0,1-1.4-1.432,5.98,5.98,0,0,0,1.744-5.141,1,1,0,0,1,1.981-.286Zm-5.993.631a2.033,2.033,0,1,1-1.414-1.414l3.781-3.781a1,1,0,1,1,1.414,1.414Z"/>
                    </svg>
                    داشبورد</a></li>
            <li><a href="{{ route('dashboard.profile') }}">
                    <svg id="User" xmlns="http://www.w3.org/2000/svg" width="22" height="24"
                         viewBox="0 0 22 24">
                        <path id="Path_1192" data-name="Path 1192"
                              d="M1,19a4.777,4.777,0,0,0,.343,2.079,2.207,2.207,0,0,0,1.174,1.055A10.011,10.011,0,0,0,5.56,22.8c1.405.142,3.185.2,5.44.2s4.035-.055,5.44-.2a10.011,10.011,0,0,0,3.043-.669,2.207,2.207,0,0,0,1.174-1.055A4.776,4.776,0,0,0,21,19a4.776,4.776,0,0,0-.343-2.079,2.207,2.207,0,0,0-1.174-1.055A10.011,10.011,0,0,0,16.44,15.2c-1.405-.142-3.185-.2-5.44-.2s-4.035.055-5.44.2a10.011,10.011,0,0,0-3.043.669,2.207,2.207,0,0,0-1.174,1.055A4.777,4.777,0,0,0,1,19Z"
                              fill="none" stroke="#151515" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2"></path>
                        <circle id="Ellipse_69" data-name="Ellipse 69" cx="5" cy="5" r="5"
                                transform="translate(16 11) rotate(180)" fill="none"
                                stroke="#151515" stroke-width="2"></circle>
                    </svg>
                    پروفایل</a></li>
            <li><a href="{{ route('dashboard.courses') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22"
                         height="22">
                        <g id="_01_align_center" data-name="01 align center">
                            <path
                                d="M24,8.007l-4,2.982V9a3,3,0,0,0-3-3H14.915l-5-5H0V3H9.086l3,3H3A3,3,0,0,0,0,9V24H20V19.011l4,2.982ZM18,22H2V9A1,1,0,0,1,3,8H17a1,1,0,0,1,1,1Zm4-3.993-2-1.491V13.484l2-1.491Z"/>
                        </g>
                    </svg>
                    دوره ها</a></li>
            <li><a href="{{ route('dashboard.transactions') }}">
                    <svg id="Outline" viewBox="0 0 24 24" width="22" height="22">
                        <path
                            d="M16,0H8A5.006,5.006,0,0,0,3,5V23a1,1,0,0,0,1.564.825L6.67,22.386l2.106,1.439a1,1,0,0,0,1.13,0l2.1-1.439,2.1,1.439a1,1,0,0,0,1.131,0l2.1-1.438,2.1,1.437A1,1,0,0,0,21,23V5A5.006,5.006,0,0,0,16,0Zm3,21.1-1.1-.752a1,1,0,0,0-1.132,0l-2.1,1.439-2.1-1.439a1,1,0,0,0-1.131,0l-2.1,1.439-2.1-1.439a1,1,0,0,0-1.129,0L5,21.1V5A3,3,0,0,1,8,2h8a3,3,0,0,1,3,3Z"/>
                        <rect x="7" y="8" width="10" height="2" rx="1"/>
                        <rect x="7" y="12" width="8" height="2" rx="1"/>
                    </svg>
                    تراکنش ها</a></li>
            <li><a href="{{ route('dashboard.orders') }}">
                    <svg id="Outline" viewBox="0 0 24 24" width="22" height="22">
                        <path
                            d="M16,0H8A5.006,5.006,0,0,0,3,5V23a1,1,0,0,0,1.564.825L6.67,22.386l2.106,1.439a1,1,0,0,0,1.13,0l2.1-1.439,2.1,1.439a1,1,0,0,0,1.131,0l2.1-1.438,2.1,1.437A1,1,0,0,0,21,23V5A5.006,5.006,0,0,0,16,0Zm3,21.1-1.1-.752a1,1,0,0,0-1.132,0l-2.1,1.439-2.1-1.439a1,1,0,0,0-1.131,0l-2.1,1.439-2.1-1.439a1,1,0,0,0-1.129,0L5,21.1V5A3,3,0,0,1,8,2h8a3,3,0,0,1,3,3Z"/>
                        <rect x="7" y="8" width="10" height="2" rx="1"/>
                        <rect x="7" y="12" width="8" height="2" rx="1"/>
                    </svg>
                    فاکتور ها</a></li>
            <li><a href="{{ route('dashboard.tickets') }}">
                    <svg id="Outline" viewBox="0 0 24 24" width="22" height="22">
                        <path
                            d="M16,0h-.13a2.02,2.02,0,0,0-1.941,1.532,2,2,0,0,1-3.858,0A2.02,2.02,0,0,0,8.13,0H8A5.006,5.006,0,0,0,3,5V21a3,3,0,0,0,3,3H8.13a2.02,2.02,0,0,0,1.941-1.532,2,2,0,0,1,3.858,0A2.02,2.02,0,0,0,15.87,24H18a3,3,0,0,0,3-3V5A5.006,5.006,0,0,0,16,0Zm2,22-2.143-.063A4,4,0,0,0,8.13,22H6a1,1,0,0,1-1-1V17H7a1,1,0,0,0,0-2H5V5A3,3,0,0,1,8,2l.143.063A4.01,4.01,0,0,0,12,5a4.071,4.071,0,0,0,3.893-3H16a3,3,0,0,1,3,3V15H17a1,1,0,0,0,0,2h2v4A1,1,0,0,1,18,22Z"/>
                        <path d="M13,15H11a1,1,0,0,0,0,2h2a1,1,0,0,0,0-2Z"/>
                    </svg>
                    تیکت ها</a></li>
            <li class="li-exit"><a class="bg-red" href="" wire:click.prevent="logout()">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24"
                         width="22" height="22">
                        <path
                            d="M22.829,9.172,18.95,5.293a1,1,0,0,0-1.414,1.414l3.879,3.879a2.057,2.057,0,0,1,.3.39c-.015,0-.027-.008-.042-.008h0L5.989,11a1,1,0,0,0,0,2h0l15.678-.032c.028,0,.051-.014.078-.016a2,2,0,0,1-.334.462l-3.879,3.879a1,1,0,1,0,1.414,1.414l3.879-3.879a4,4,0,0,0,0-5.656Z"/>
                        <path
                            d="M7,22H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2H7A1,1,0,0,0,7,0H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H7a1,1,0,0,0,0-2Z"/>
                    </svg>
                    خروج</a>
            </li>
        </ul>
    </div>

</div>
