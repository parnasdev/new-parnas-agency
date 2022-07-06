<div>
    <x-parnas.loading wire:loading></x-parnas.loading>
    <div class="courses-dashboard">
        <div class="title-courses-dashboard">
            <i class="icon-circle"></i>
            <h2>{{ $ticket->title }}</h2>

        </div>
        <div class="parent-ticket-chat">
            <div class="chat-r">
                <div class="w-75 d-flex flex-column-mobi w-full-mobi">
                    <div class="d-flex flex-column align-items-center avatar-info">
                        <img width="58" src="/images/woman.png" alt="">
                        <p class="font-weight-bold mt-2">{{ $ticket->user->fullname() ?? $ticket->user->phone ?? $ticket->user->email }}</p>
                    </div>
                    <div class="text-description-ticket">{{ $ticket->body }}</div>
                </div>
                <div class="other-info-user-ticket">
                    <p>{{ $ticket->user->role->label }}</p>
                    <p>{{ jdate($ticket->created_at)->ago() }}</p>
                </div>
                @if($ticket->files->isNotEmpty())
                    <a class="file-chat" href="{{ $ticket->files->first()?->url }}" target="_blank">فایل ضمینه</a>
                @endif

            </div>
        @foreach($ticket->children()->get() as $child)

            @if($child->user->role_id != 3)
                <div class="chat-l">
                    <div class="d-flex w-75 align-items-start flex-column-mobi w-full-mobi">
                        <div class="d-flex flex-column col-md-2 align-items-center avatar-info">
                            <img width="58" src="/images/manger.png" alt="">
                            <p class="font-weight-bold mt-2">{{ $child->user->fullname() ?? $child->user->phone ?? $child->user->email }}</p>



                        </div>
                        <div class="text-description-ticket">{{ $child->body }}</div>
                    </div>
                    <div class="other-info-user-ticket">
                        <span>{{ $child->user->role->label }}</span>
                        <p>{{ jdate($child->created_at)->ago() }}</p>
                    </div>
                    @if($child->files->isNotEmpty())
                        <a class="file-chat" href="{{ $child->files->first()?->url }}" target="_blank">فایل ضمینه</a>
                    @endif
                </div>
            @else
                <div class="chat-r">
                    <div class="w-75 d-flex flex-column-mobi w-full-mobi">
                        <div class="d-flex flex-column align-items-center avatar-info">
                            <img width="58" src="/images/woman.png" alt="">
                            <p class="font-weight-bold mt-2">{{ $child->user->fullname() ?? $child->user->phone ?? $child->user->email }}</p>
                        </div>
                        <div class="text-description-ticket">{{ $child->body }}</div>
                    </div>
                    <div class="other-info-user-ticket">
                        <p>{{ $child->user->role->label }}</p>
                        <p>{{ jdate($child->created_at)->ago() }}</p>
                    </div>
                    @if($child->files->isNotEmpty())
                        <a class="file-chat" href="{{ $child->files->first()?->url }}" target="_blank">فایل ضمینه</a>
                    @endif

                </div>
            @endif



        @endforeach
        </div>


{{--            <div style="margin-top: 2rem" class="card">--}}
{{--                <div class="card-body row g-1">--}}

{{--                        <div class="col-md-9">--}}
{{--                            <p class="text-description">{{ $child->body }}</p>--}}

{{--                        </div>--}}
{{--                        <div class="col-md-3">--}}
{{--                            <img src="{{ $child->user->files->first()?->url ?? '/images/noPicture.png' }}" width="150"--}}
{{--                                 alt="">--}}
{{--                            <p>{{ $child->user->fullname() ?? $child->user->phone ?? $child->user->email }}</p>--}}
{{--                            <p>{{ $child->user->role->label }}</p>--}}
{{--                            <p>{{ jdate($child->created_at)->ago() }}</p>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3">--}}
{{--                            <img src="{{ $child->user->files->first()?->url ?? '/images/noPicture.png' }}" width="150"--}}
{{--                                 alt="">--}}
{{--                            <p>{{ $child->user->fullname() ?? $child->user->phone ?? $child->user->email }}</p>--}}
{{--                            <p>{{ $child->user->role->label }}</p>--}}
{{--                            <p>{{ jdate($child->created_at)->ago() }}</p>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-9">--}}
{{--                            <p class="text-description">{{ $child->body }}</p>--}}
{{--                            @if($child->files->isNotEmpty())--}}
{{--                                <a href="{{ $child->files->first()?->url }}" target="_blank">فایل ضمینه</a>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--        <div style="margin-top: 2rem" class="card">--}}
{{--            <div class="card-body row g-1">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="ticket-r w-100 d-flex">--}}
{{--                        <img width="50" src="/images/user-question.png" alt="">--}}
{{--                        <p class="font-weight-bold mt-2">{{ $ticket->user->fullname() ?? $ticket->user->phone ?? $ticket->user->email }}</p>--}}
{{--                    </div>--}}
{{--                    <p>{{ $ticket->user->role->label }}</p>--}}
{{--                    <p>{{ jdate($ticket->created_at)->ago() }}</p>--}}
{{--                </div>--}}
{{--                <div class="col-md-9">--}}
{{--                    <p class="text-description">{{ $ticket->body }}</p>--}}
{{--                    @if($ticket->files->isNotEmpty())--}}
{{--                        <a href="{{ $ticket->files->first()?->url }}" target="_blank">فایل ضمینه</a>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div style="margin-top: 2rem" class="courses-dashboard">
            <div class="title-courses-dashboard">
                <i class="icon-circle"></i>
                <h2>پاسخ تیکت</h2>

            </div>
            @if($ticket->status_id == getStatus('close'))
                تیکت بسته شده است
            @else
                <form wire:submit.prevent="submit">
                    <div class="mb-2">
                        <label class="label-ticket" for="">متن</label>
                        <textarea style="width: 100% !important;" class="textarea-ticket" rows="5"
                                  wire:model.defer="replay.body"></textarea>
                        @error('replay.body')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-2 d-flex flex-column">
                        <label class="label-ticket" for="">فایل</label>
                        <input type="file" class="inp-ticket" wire:model.defer="file">
                        @error('file')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <button style="margin-top: 1rem" class="btn-submit-ticket">
                            <i class="icon-circle"></i>
                            ارسال
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
@push('title' , "جزئیات تیکت $ticket->title ")
