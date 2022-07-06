@props(['minDate' => '' , 'maxDate' => ''])
<div class="flex-30 xl-flex-20 m-flex-100 date-time pos-relative" x-data="calender">
    <!--? input  -->
    <div class="c-input c-date align-items-end flex-100">
        <div class="d-flex justify-content-start m-left-auto pos-relative pr-5">
            <label for="useData" class="d-flex f-12 text-63">
                تاریخ انقضاء
                <div class="rx-title title-input pb-10">
                    <div class="p-rx">
                        <div class="rx-border-rectangle-after label-input"></div>
                    </div>
                </div>
            </label>
        </div>
        <input type="text" {{ $attributes->whereDoesntStartWith('wire:model') }} x-model="inputData"
               @click="show = !show">
        <div class="icon-text">
            <svg class="ic-svg" width="20" height="20" viewBox="0 0 31 32" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <rect x="4.19922" y="8.33008" width="22.9477" height="19.1708" rx="2" stroke="#CCD2E3"
                      stroke-width="2"/>
                <path d="M5.47266 14.7207H25.8706" stroke="#CCD2E3" stroke-width="2" stroke-linecap="round"/>
                <path d="M11.8477 21.1113H19.4969" stroke="#CCD2E3" stroke-width="2" stroke-linecap="round"/>
                <path d="M10.5742 4.49609L10.5742 9.60831" stroke="#CCD2E3" stroke-width="2" stroke-linecap="round"/>
                <path d="M20.7734 4.49609L20.7734 9.60831" stroke="#CCD2E3" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </div>
    </div>
    <!--? (date | time)  -->
    <div class="p-date bg-dark pt-7 pb-15 radius-5" x-show="show"
         @click.outside="show = false"
         x-transition.scale
         x-transition.duration.500ms
         style="display: none;">
        <!--? local date  -->
        <div class="local-date d-flex">
            <div class="prev-data flex-5" @click="changeMonth(-1)">
                <svg width="20" height="20" viewBox="0 0 32 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19.9414 15.5726L20.6494 14.8664L21.3539 15.5726L20.6494 16.2789L19.9414 15.5726ZM13.0002 7.19807L20.6494 14.8664L19.2334 16.2789L11.5842 8.61052L13.0002 7.19807ZM20.6494 16.2789L13.0002 23.9472L11.5842 22.5347L19.2334 14.8664L20.6494 16.2789Z"
                        fill="#fff"/>
                </svg>
            </div>
            <div class="controller-data flex-88 py-0">
                <!--? month  -->
                <div class="month">
                    <div class="year-title pr-9">
                        <h6 class="text-white pb-3" x-text="months.find(x=> x.id == month).value"></h6>
                        <span class="f-12 text-white" x-text="year"></span>
                    </div>
                    <!--? days week -->
                    <div class="days-week">
                        <div class="head d-flex justify-content-center pb-6">
                            <span class="f-12 text-white">ش</span>
                        </div>
                        <div class="head d-flex justify-content-center pb-6">
                            <span class="f-12 text-white">ی</span>
                        </div>
                        <div class="head d-flex justify-content-center pb-6">
                            <span class="f-12 text-white">د</span>
                        </div>
                        <div class="head d-flex justify-content-center pb-6">
                            <span class="f-12 text-white">س</span>
                        </div>
                        <div class="head d-flex justify-content-center pb-6">
                            <span class="f-12 text-white">چ</span>
                        </div>
                        <div class="head d-flex justify-content-center pb-6">
                            <span class="f-12 text-white">پ</span>
                        </div>
                        <div class="head d-flex justify-content-center pb-6">
                            <span class="f-12 text-white">ج</span>
                        </div>
                    </div>
                    <!--? day (number) -->
                    <div class="day py-7">
                        <template x-for="data of calenderData">
                            <div class="num-data d-flex justify-content-center py-6"
                                 :class="{'holiday' : data.isHolidy , 'disable-day' : data.status === 'disabled' , 'active-day' : data.isToday , 'selected-day': isSelectedDay(data.value)}"
                                 @click="selectDate(data)">
                                <template x-if="data.status !== 'hidden'">
                                    <span class="f-12 text-white" x-text="getDay(data.value)"></span>
                                </template>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
            <div class="next-data flex-5" @click="changeMonth(1)">
                <svg width="20" height="20" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M17.8359 23.2251L17.1279 22.5189L16.4235 23.2251L17.1279 23.9314L17.8359 23.2251ZM28.6018 11.0164L17.1279 22.5189L18.5439 23.9314L30.0178 12.4289L28.6018 11.0164ZM17.1279 23.9314L28.6018 35.4339L30.0178 34.0214L18.5439 22.5189L17.1279 23.9314Z"
                        fill="#fff"/>
                </svg>
            </div>
        </div>
        <!--? local time  -->
        <div
            class="local-time d-flex flex-30 justify-content-center m-auto flex-direction-row-reverse align-items-center">
            <!--! hour  -->
            <div class="c-hour d-flex flex-50 flex-direction-column align-items-center">
                <div class="prev-data d-flex" @click="changeTime(1 , 'hour')">
                    <svg width="20" height="20" viewBox="0 0 32 32 " fill="none " xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.1203 12.084L16.8283 11.3778L16.1203 10.668L15.4123 11.3778L16.1203 12.084ZM24.4775 19.0461L16.8283 11.3778L15.4123 12.7902L23.0615 20.4585L24.4775 19.0461ZM15.4123 11.3778L7.76309
                                                            19.0461L9.17906 20.4585L16.8283 12.7902L15.4123 11.3778Z"
                              fill="#636363"/>
                    </svg>
                </div>
                <div class="hour d-flex align-items-center">
                    <span class="f-12 text-white" x-text="hour"></span>
                </div>
                <div class="next-data d-flex" @click="changeTime(-1 , 'hour')">
                    <svg width="20" height="20 " viewBox="0 0 32 32 " fill="none " xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.1203 20.1016L16.8283 20.8078L16.1203 21.5175L15.4123 20.8078L16.1203 20.1016ZM24.4775 13.1395L16.8283 20.8078L15.4123 19.3953L23.0615 11.727L24.4775 13.1395ZM15.4123 20.8078L7.76309
                                                            13.1395L9.17906 11.727L16.8283 19.3953L15.4123 20.8078Z"
                              fill="#636363"/>
                    </svg>
                </div>
            </div>
            <div class="space-time flex-10 d-flex justify-content-center">
                <span class="f-12 text-white">:</span>
            </div>
            <!--! minute -->
            <div class="c-minute d-flex flex-50 flex-direction-column align-items-center ">
                <div class="prev-data d-flex" @click="changeTime(1 , 'minute')">
                    <svg width="20" height="20" viewBox="0 0 32 32 " fill="none " xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.1203 12.084L16.8283 11.3778L16.1203 10.668L15.4123 11.3778L16.1203 12.084ZM24.4775 19.0461L16.8283 11.3778L15.4123 12.7902L23.0615 20.4585L24.4775 19.0461ZM15.4123 11.3778L7.76309
                                                            19.0461L9.17906 20.4585L16.8283 12.7902L15.4123 11.3778Z"
                              fill="#636363"/>
                    </svg>
                </div>
                <div class="minute d-flex align-items-center">
                    <span class="f-12 text-white" x-text="min"></span>
                </div>
                <div class="next-data d-flex" @click="changeTime(-1 , 'minute')">
                    <svg width="20" height="20" viewBox="0 0 32 32 " fill="none " xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.1203 20.1016L16.8283 20.8078L16.1203 21.5175L15.4123 20.8078L16.1203 20.1016ZM24.4775 13.1395L16.8283 20.8078L15.4123 19.3953L23.0615 11.727L24.4775 13.1395ZM15.4123 20.8078L7.76309
                                                            13.1395L9.17906 11.727L16.8283 19.3953L15.4123 20.8078Z"
                              fill="#636363"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function calender() {
            return {
                month: null,
                year: null,
                minDate: null,
                maxDate: null,
                separator: '/',
                format: null,
                jFormat: null,
                show: false,
                inputData: null,
                hour: null,
                min: null,
                months: [
                    {
                        id: 1,
                        value: "فرودین"
                    },
                    {
                        id: 2,
                        value: "اردیبهشت"
                    },
                    {
                        id: 3,
                        value: "خرداد"
                    },
                    {
                        id: 4,
                        value: "تیر"
                    },
                    {
                        id: 5,
                        value: "مرداد"
                    },
                    {
                        id: 6,
                        value: "شهریور"
                    },
                    {
                        id: 7,
                        value: "مهر"
                    },
                    {
                        id: 8,
                        value: "آبان"
                    },
                    {
                        id: 9,
                        value: "آذر"
                    },
                    {
                        id: 10,
                        value: "دی"
                    },
                    {
                        id: 11,
                        value: "بهمن"
                    },
                    {
                        id: 12,
                        value: "اسفند"
                    },
                ],
                calenderData: [],
                selectedDate: @entangle($attributes->whereStartsWith('wire:model')->first()).defer,
                init() {

                    this.format = 'YYYY' + this.separator + 'M' + this.separator + 'D';

                    this.jFormat = 'jYYYY' + this.separator + 'jM' + this.separator + 'jD';

                    this.$watch('selectedDate', value => {
                        this.inputData = moment(value).set({
                            hour: this.hour,
                            minute: this.min
                        }).format(this.jFormat + ' HH:mm');
                    })

                    this.$watch('hour', value => {
                        this.selectedDate = moment(this.selectedDate).set({
                            hour: value,
                            minute: this.min
                        }).format(this.format + ' HH:mm');
                    });

                    this.$watch('min', value => {
                        this.selectedDate = moment(this.selectedDate).set({
                            hour: this.hour,
                            minute: value
                        }).format(this.format + ' HH:mm');
                    });

                    if (this.selectedDate !== null)
                        this.inputData = moment(this.selectedDate).format(this.jFormat + ' HH:mm');
                    else {
                        this.inputData = moment().format(this.jFormat + ' HH:mm');
                    }

                    this.month = +moment(this.inputData, this.jFormat).format('jM')
                    this.year = +moment(this.inputData, this.jFormat).format('jYYYY')
                    this.hour = +moment(this.inputData, this.jFormat + ' HH:mm').format('HH')
                    this.min = +moment(this.inputData, this.jFormat + ' HH:mm').format('mm')


                    this.minDate = '{{ $minDate }}';
                    this.maxDate = '{{ $maxDate }}';

                    this.generateCalender();
                }
                ,
                changeMonth(num) {
                    if (this.month === 12 && num > 0) {
                        this.month = 1;
                        this.year += num;
                    } else if (this.month === 1 && num < 0) {
                        this.month = 12;
                        this.year += num;
                    } else {
                        this.month += num;
                    }
                    this.generateCalender();
                }
                ,
                generateCalender() {
                    this.calenderData = [];
                    let dates = [];

                    for (let i = 1; i <= +moment().jDaysInMonth(this.year, this.month); i++) {
                        dates.push(this.year + this.separator + this.month + this.separator + i);
                    }
                    let firstDate = dates[0]

                    switch (moment(firstDate, this.jFormat).day()) {
                        case 0:
                            dates.unshift(
                                moment(firstDate, this.jFormat).subtract(1, "days").format(this.jFormat),
                            )
                            break;
                        case 1:
                            dates.unshift(
                                moment(firstDate, this.jFormat).subtract(2, "days").format(this.jFormat),
                                moment(firstDate, this.jFormat).subtract(1, "days").format(this.jFormat),
                            )
                            break;
                        case 2:
                            dates.unshift(
                                moment(firstDate, this.jFormat).subtract(3, "days").format(this.jFormat),
                                moment(firstDate, this.jFormat).subtract(2, "days").format(this.jFormat),
                                moment(firstDate, this.jFormat).subtract(1, "days").format(this.jFormat),
                            )
                            break;
                        case 3:
                            dates.unshift(
                                moment(firstDate, this.jFormat).subtract(4, "days").format(this.jFormat),
                                moment(firstDate, this.jFormat).subtract(3, "days").format(this.jFormat),
                                moment(firstDate, this.jFormat).subtract(2, "days").format(this.jFormat),
                                moment(firstDate, this.jFormat).subtract(1, "days").format(this.jFormat),
                            )
                            break;
                        case 4:
                            dates.unshift(
                                moment(firstDate, this.jFormat).subtract(5, "days").format(this.jFormat),
                                moment(firstDate, this.jFormat).subtract(4, "days").format(this.jFormat),
                                moment(firstDate, this.jFormat).subtract(3, "days").format(this.jFormat),
                                moment(firstDate, this.jFormat).subtract(2, "days").format(this.jFormat),
                                moment(firstDate, this.jFormat).subtract(1, "days").format(this.jFormat),
                            )
                            break;
                        case 5:
                            dates.unshift(
                                moment(firstDate, this.jFormat).subtract(6, "days").format(this.jFormat),
                                moment(firstDate, this.jFormat).subtract(5, "days").format(this.jFormat),
                                moment(firstDate, this.jFormat).subtract(4, "days").format(this.jFormat),
                                moment(firstDate, this.jFormat).subtract(3, "days").format(this.jFormat),
                                moment(firstDate, this.jFormat).subtract(2, "days").format(this.jFormat),
                                moment(firstDate, this.jFormat).subtract(1, "days").format(this.jFormat),
                            )
                            break;
                        case 6:
                            break;
                    }

                    dates.forEach(item => {
                        let status = 'active';

                        if (moment(item, this.jFormat).format('jM') !== moment(this.year + this.separator + this.month + this.separator + 1, this.jFormat).format('jM')) {
                            status = 'disabled'
                        }

                        if (!moment(item , this.jFormat).isValid()) {
                            status = 'hidden'
                        } else if ((this.minDate !== null || this.minDate !== '') && moment(item, this.jFormat).isBefore(moment(this.minDate, this.jFormat))) {
                            status = 'disabled'
                        } else if ((this.minDate !== null || this.maxDate !== '') && moment(item, this.jFormat).isAfter(moment(this.maxDate, this.jFormat))) {
                            status = 'disabled'
                        }


                        this.calenderData.push({
                            'value': item,
                            'valueEn': moment(item, this.jFormat).format(this.format),
                            'isToday': moment(item, this.jFormat).isSame(moment(), 'day'),
                            'isHoliday': moment(item, this.jFormat).day() === 5,
                            'status': status
                        })
                    });

                console.log(this.calenderData)
                },
                getDay(date) {
                    return date.split(this.separator)[2]
                },
                selectDate(obj) {
                    if (obj.status === 'active') {
                        this.selectedDate = moment(obj.valueEn).set({
                            hour: this.hour,
                            minute: this.min
                        }).format('YYYY/MM/DD HH:mm')
                        this.show = false;

                    }
                },
                isSelectedDay(date) {
                    return moment(date, this.jFormat).isSame(moment(this.inputData, this.jFormat), 'day')
                },
                changeTime(num, mode) {
                    if (mode === 'hour') {
                        if (+this.hour === 23 && num > 0) {
                            this.hour = 0;
                        } else if (+this.hour === 0 && num < 0) {
                            this.hour = 23;
                        } else {
                            this.hour += +num
                        }
                    } else {
                        if (+this.min === 59 && num > 0) {
                            this.hour = 0;
                        } else if (+this.min === 0 && num < 0) {
                            this.hour = 59;
                        } else {
                            this.min += +num
                        }
                    }
                }
            }
        }
    </script>
@endpush

