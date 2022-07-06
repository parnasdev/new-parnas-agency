<div>
    <div class="main-data flex-100 d-flex align-items-start m-align-items-stretch justify-content-between mx-10 m-mx-5 my-5">
        <!--! c-right  -->
        <div class="c-right box-design bg-white flex-70 px-5 py-10 ml-7">
            <div class="">
                <!--? row form  -->
                <div class="mx-10 m-mx-5 mb-15">
                    <div class="c-data">
                        <!--! title  -->
                        <div class="rx-title pb-3">
                            <div class="main-data flex-100 d-flex justify-content-between">
                                <div class="title d-flex align-items-center pb-10">
                                    <div class="text">
                                        <h6>پخش ویدیو</h6>
                                    </div>
                                    <div class="p-rx">
                                        <div class="rx-border-rectangle"></div>
                                        <div class="rx-border-rectangle-after"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--! data form  -->
                        <div class="my-10">
                            <!--? data video  -->
                            <div class="data-video d-flex flex-wrap justify-content-between flex-100">
                                <!--? child data video  -->
                                <div class="c-dataVideo flex-100 mb-10">
                                    <div class="title-video d-flex align-items-center justify-content-center bg-dark py-10 px-7">
                                        <div class="text d-flex align-items-center justify-content-center">
                                            <span class="f-12 text-white pl-5">{{ collect($episodes)->firstWhere('id' , $video)['title'] ?? '' }} :</span>
                                            <span class="f-12 text-white">{{ collect($episodes)->firstWhere('id' , $video)['subtitle'] ?? '' }}</span>
                                        </div>
                                    </div>
                                    {!! collect($episodes)->firstWhere('id' , $video)['video'] ?? '' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--! c-left -->
        <div class="c-left box-design bg-white flex-28">
            <div class="sticky-data scroller h-93vh">
                <!--? data video  -->
                <div class="data-video d-flex flex-wrap justify-content-between flex-100 mx-8 py-10">
                    <!--? child data video  -->
                    @foreach($courses as $course)
                        <div class="c-dataVideo flex-100 mb-10">
                        <div class="title-video d-flex flex-direction-column justify-content-between pt-10 px-7">
                            <div class="describ flex-100 d-flex justify-content-between">
                                <div class="text d-flex flex-direction-column align-items-start">
                                    <span class="f-12 text-warning pl-5">{{ $course['title'] }} :</span>
                                    <span class="f-12 text-white">{{ $course['subtitle'] }}</span>
                                </div>
                            </div>
                            <div class="c-vdata px-9 py-7">
                                <!--? child -->
                                @foreach(collect($episodes)->where('course_id' , $course['id']) as $episode)
                                <div class="c-in-vdata d-flex align-items-center justify-content-between mb-7" wire:click="openVideo('{{ $episode['id'] }}')">
                                    <div class="text d-flex flex-direction-column align-items-start pr-5">
                                        <span class="f-12 text-warning pl-5">{{ $episode['title'] }} :</span>
                                        <span class="f-12 text-info">{{ $episode['subtitle'] }}</span>
                                    </div>
                                   <div class="arrow d-flex align-items-center pl-5">
                                       <svg width="20" height="20" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                           <path d="M19.4333 15.6532C19.4333 17.9267 17.5956 19.7655 15.3339 19.7655C13.0721 19.7655 11.2344 17.9267 11.2344 15.6532C11.2344 13.3798 13.0721 11.541 15.3339 11.541C17.5956 11.541 19.4333 13.3798 19.4333 15.6532Z" stroke="#fff" stroke-width="2"/>
                                           <path d="M26.0082 14.5827C26.3908 15.0629 26.5821 15.3031 26.5821 15.6527C26.5821 16.0024 26.3908 16.2425 26.0082 16.7227C24.3283 18.8313 20.182 23.321 15.3332 23.321C10.4844 23.321 6.33814 18.8313 4.6582 16.7227C4.27562 16.2425 4.08432 16.0024 4.08432 15.6527C4.08432 15.3031 4.27562 15.0629 4.6582 14.5827C6.33814 12.4741 10.4844 7.98438 15.3332 7.98438C20.182 7.98438 24.3283 12.4741 26.0082 14.5827Z" stroke="#fff" stroke-width="2"/>
                                       </svg>
                                   </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



