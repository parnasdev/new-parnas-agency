<div>
    <div class="main-data flex-100 d-flex align-items-start m-align-items-stretch justify-content-between mx-10 my-5">
        <!--! c-right -->
        <x-parnas.spinners :full="true" wire:loading
                           wire:target="status , gotoPage , previousPage , nextPage , changeStatus , selectedAction , delete , forceDelete , selected , cStatus , changeCourseStatus"/>
        <div class="dark-theme box-design bg-white flex-99 px-5 py-10">
            <div class="">
                <!--? row form  -->
                <div class="mx-10 m-mx-5 mb-15">
                    <div class="c-data">
                        <!--! title  -->
                        <div class="rx-title pb-3">
                            <div class="main-data flex-100 d-flex justify-content-between">
                                <div class="title d-flex align-items-center pb-10">
                                    <div class="text">
                                        <h6>صندوق ورودی</h6>
                                    </div>
                                    <div class="p-rx">
                                        <div class="rx-border-rectangle"></div>
                                        <div class="rx-border-rectangle-after"></div>
                                    </div>
                                </div>
                                <!--? group[button]  -->
                            </div>
                        </div>
                        <!--! data form  -->
                        <div class="my-10">
                            <!-- parent -->
                            <div class="p-table p-0">
                                <!--! table  -->
                                <div class="controller-table scroller">
                                    <!--? thead -->
                                    <div class="d-thead">
{{--                                        <div class="head flex-9 m-flex-15">--}}
{{--                                            <span class="f-12 f-bold">شناسه</span>--}}
{{--                                        </div>--}}
                                        @foreach(collect($form->inputs)->sortBy('order') as $content)
                                            <div class="head flex-22 m-flex-40">
                                                <span class="f-12 f-bold">{{ $content['label'] }}</span>
                                            </div>
                                        @endforeach
                                            <div class="head sticky-table flex-11 m-flex-35">
                                                <span class="f-12 f-bold">عملیات</span>
                                            </div>
                                    </div>
                                @php
                                    $keys = collect($this->form->inputs)->sortBy('order')->pluck('id');
                                @endphp
                                    <!--? tdetail  -->
                                    <div class="data">
                                        <!--? child(1)  -->
                                        @forelse($inboxes ?? [] as $index => $inbox)
                                            <div class="d-detail">
{{--                                                <div class="detail flex-9 m-flex-15"></div>--}}
                                                @foreach($keys as $key)
                                                <div class="detail flex-22 m-flex-40">
                                                    <span class="f-12">{{ \Illuminate\Support\Str::limit($inbox[$key] , 30) }}</span>
                                                </div>
                                                @endforeach
                                                <div class="detail d-flex flex-wrap sticky-table flex-11 m-flex-35">
                                                    <button
                                                        wire:click="viewInbox({{$index}})"
                                                       class="d-flex justify-content-center bg-transparent ml-5">
                                                        <div class="image tooltip d-flex cursor-pointer">
                                                            <svg width="20" height="20" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M19.4333 15.6532C19.4333 17.9267 17.5956 19.7655 15.3339 19.7655C13.0721 19.7655 11.2344 17.9267 11.2344 15.6532C11.2344 13.3798 13.0721 11.541 15.3339 11.541C17.5956 11.541 19.4333 13.3798 19.4333 15.6532Z" stroke="#237e8c" stroke-width="2"/>
                                                                <path d="M26.0082 14.5827C26.3908 15.0629 26.5821 15.3031 26.5821 15.6527C26.5821 16.0024 26.3908 16.2425 26.0082 16.7227C24.3283 18.8313 20.182 23.321 15.3332 23.321C10.4844 23.321 6.33814 18.8313 4.6582 16.7227C4.27562 16.2425 4.08432 16.0024 4.08432 15.6527C4.08432 15.3031 4.27562 15.0629 4.6582 14.5827C6.33814 12.4741 10.4844 7.98438 15.3332 7.98438C20.182 7.98438 24.3283 12.4741 26.0082 14.5827Z" stroke="#237e8c" stroke-width="2"/>
                                                            </svg>
                                                            <div class="s-tooltip">
                                                                <span>مشاهده</span>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    <button
                                                        wire:click="delete({{$index}})"
                                                            class="d-flex justify-content-center bg-transparent ml-5">
                                                        <div class="image tooltip d-flex cursor-pointer">
                                                            <svg width="20" height="20" viewBox="0 0 31 31" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12.7852 19.2988L12.7852 15.4647"
                                                                      stroke="#ff383f" stroke-width="2"
                                                                      stroke-linecap="round"/>
                                                                <path d="M17.8828 19.2988L17.8828 15.4647"
                                                                      stroke="#ff383f" stroke-width="2"
                                                                      stroke-linecap="round"/>
                                                                <path
                                                                    d="M3.85938 9.07617H26.8071V9.07617C25.0914 9.07617 24.2336 9.07617 23.6689 9.56799C23.5996 9.62832 23.5346 9.69336 23.4743 9.76264C22.9824 10.3273 22.9824 11.1851 22.9824 12.9008V21.6909C22.9824 23.5765 22.9824 24.5193 22.3967 25.1051C21.8109 25.6909 20.8681 25.6909 18.9824 25.6909H11.684C9.79837 25.6909 8.85556 25.6909 8.26977 25.1051C7.68399 24.5193 7.68399 23.5765 7.68399 21.6909V12.9008C7.68399 11.1851 7.68399 10.3273 7.19217 9.76264C7.13184 9.69336 7.0668 9.62832 6.99752 9.56799C6.43283 9.07617 5.57501 9.07617 3.85938 9.07617V9.07617Z"
                                                                    stroke="#ff383f" stroke-width="2"
                                                                    stroke-linecap="round"/>
                                                                <path
                                                                    d="M12.8702 4.43653C13.0155 4.30065 13.3356 4.18058 13.7809 4.09494C14.2262 4.00931 14.7718 3.96289 15.3331 3.96289C15.8944 3.96289 16.44 4.00931 16.8853 4.09494C17.3306 4.18058 17.6507 4.30065 17.7959 4.43653"
                                                                    stroke="#ff383f" stroke-width="2"
                                                                    stroke-linecap="round"/>
                                                            </svg>
                                                            <div class="s-tooltip">
                                                                <span>حذف</span>
                                                            </div>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="empty-data">
                                                <div class="main-empty d-flex flex-direction-column align-items-center">
                                                    <div class="image">
                                                        <img src="/img/gif/empty-data.gif" alt="empty" />
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                        {{ $inboxes->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@if($inboxes->count() > 0)

        <x-parnas.modal name="view" :lg="true">
            <x-slot name="title">جزئیات پیام</x-slot>
            <div class="d-flex flex-direction-column align-items-start">
                @foreach(collect($form->inputs)->sortBy('order') as $content)
                    <div>
                        <span class="f-12 f-bold">{{ $content['label'] }}:&nbsp;</span>
                    </div>
                    <div class="flex-100 pr-10">
                        <span class="f-12">{{ $inboxes[$index1][ $content['id']] }}</span>
                    </div>
                @endforeach
            </div>
        </x-parnas.modal>
@endif
</div>
