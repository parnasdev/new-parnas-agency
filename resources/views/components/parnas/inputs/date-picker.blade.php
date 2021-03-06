@props(['minDate' => '' , 'maxDate' => ''])
<div class="flex-30 date-time pos-relative ml-30" x-data="calender">
    <!--? input  -->
    <div class="c-input c-date align-items-end flex-100 mr-10">
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
    <!--? (date)  -->
    <div class="p-date bg-dark pt-7 pb-15 mx-10 radius-5" x-show="show" @click.outside="show = false"
         x-transition.scale
         x-transition.duration.500ms
         style="display: none;">
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
                        <h6 class="text-white pb-3" x-text="months.find(x=> x.id === month).value"></h6>
                        <span class="f-12 text-white" x-text="year"></span>
                    </div>
                    <!--? days week -->
                    <div class="days-week">
                        <div class="head d-flex justify-content-center pb-6">
                            <span class="f-12 text-white">??</span>
                        </div>
                        <div class="head d-flex justify-content-center pb-6">
                            <span class="f-12 text-white">??</span>
                        </div>
                        <div class="head d-flex justify-content-center pb-6">
                            <span class="f-12 text-white">??</span>
                        </div>
                        <div class="head d-flex justify-content-center pb-6">
                            <span class="f-12 text-white">??</span>
                        </div>
                        <div class="head d-flex justify-content-center pb-6">
                            <span class="f-12 text-white">??</span>
                        </div>
                        <div class="head d-flex justify-content-center pb-6">
                            <span class="f-12 text-white">??</span>
                        </div>
                        <div class="head d-flex justify-content-center pb-6">
                            <span class="f-12 text-white">??</span>
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
                selectedDate: @entangle($attributes->whereStartsWith('wire:model')->first()).defer,
                inputData:null,
                months:[
                {
                    id: 1,
                    value: "????????????"
                },
                {
                    id: 2,
                    value: "????????????????"
                },
                {
                    id: 3,
                    value: "??????????"
                },
                {
                    id: 4,
                    value: "??????"
                },
                {
                    id: 5,
                    value: "??????????"
                },
                {
                    id: 6,
                    value: "????????????"
                },
                {
                    id: 7,
                    value: "??????"
                },
                {
                    id: 8,
                    value: "????????"
                },
                {
                    id: 9,
                    value: "??????"
                },
                {
                    id: 10,
                    value: "????"
                },
                {
                    id: 11,
                    value: "????????"
                },
                {
                    id: 12,
                    value: "??????????"
                },
            ],
                calenderData
        :
            [],
                init()
            {

                this.format = 'YYYY' + this.separator + 'M' + this.separator + 'D';

                this.jFormat = 'jYYYY' + this.separator + 'jM' + this.separator + 'jD';

                this.$watch('selectedDate', value => {
                    this.inputData = moment(value).format(this.jFormat);
                })

                if (this.selectedDate !== null)
                    this.inputData = moment(this.selectedDate).format(this.jFormat + ' HH:mm');
                else
                    this.inputData = moment().format(this.jFormat + ' HH:mm');

                this.month = +moment(this.inputData, this.jFormat).format('jM')
                this.year = +moment(this.inputData, this.jFormat).format('jYYYY')

                this.minDate = '{{ $minDate }}';
                this.maxDate = '{{ $maxDate }}';

                this.generateCalender();
            }
        ,
            changeMonth(num)
            {
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
            generateCalender () {
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
                    } else if ((this.minDate !== null || this.minDate !== '') && moment(item, this.jFormat).isBefore(moment(this.minDate, this.jFormat))) {
                        status = 'disabled'
                    } else if ((this.minDate !== null || this.maxDate !== '') && moment(item, this.jFormat).isAfter(moment(this.maxDate, this.jFormat))) {
                        status = 'disabled'
                    } else if (!moment(item , this.jFormat).isValid()) {
                        status = 'hidden'
                    }


                    this.calenderData.push({
                        'value': item,
                        'valueEn': moment(item, this.jFormat).format(this.format),
                        'isToday': moment(item, this.jFormat).isSame(moment(), 'day'),
                        'isHoliday': moment(item, this.jFormat).day() === 5,
                        'status': status
                    })
                });
            }
        ,
            getDay(date)
            {
                return date.split(this.separator)[2]
            }
        ,
            selectDate(obj)
            {
                if (obj.status !== 'disabled') {
                    this.selectedDate = obj.valueEn
                    this.show = false;

                }
            },
            isSelectedDay(date) {
                return moment(date , this.jFormat).isSame(moment(this.inputData , this.jFormat) , 'day')
            }
        }
        }
    </script>
@endpush
