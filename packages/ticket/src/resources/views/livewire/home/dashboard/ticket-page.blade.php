<div>
    <x-parnas.loading wire:loading></x-parnas.loading>
    <div class="courses-dashboard">
        <div class="title-courses-dashboard justify-content-between">
            <div class="d-flex">
                <i class="icon-circle"></i>
                <h2>تیکت ها</h2>
            </div>

            <a href="{{ route('dashboard.tickets.create') }}" class="btn-create-ticket">ایجاد</a>
        </div>
        <div class="list-courses-dashboard">
            <div class="header-courses">
                <span>شناسه تیکت</span>
                <span>تاریخ</span>
                <span>عنوان</span>
                <span>وضعیت</span>
                <span>اقدام</span>
            </div>
            @foreach($tickets as $ticket)
                <div class="body-courses">
                    <span>{{ $ticket->id }}</span>
                    <span>{{ jdate($ticket->created_at)->format('Y/m/d H:i') }}</span>
                    <span>{{ $ticket->title }}</span>
                    <span>{{ $ticket->status->label }}</span>
                    <span>
                        <a class="btn-login" href="{{ route('dashboard.tickets.show' , ['ticket' => $ticket->id]) }}">
                            <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.4333 15.6532C19.4333 17.9267 17.5956 19.7655 15.3339 19.7655C13.0721 19.7655 11.2344 17.9267 11.2344 15.6532C11.2344 13.3798 13.0721 11.541 15.3339 11.541C17.5956 11.541 19.4333 13.3798 19.4333 15.6532Z"
                                stroke="#CCD2E3" stroke-width="2"/>
                            <path
                                d="M26.0082 14.5827C26.3908 15.0629 26.5821 15.3031 26.5821 15.6527C26.5821 16.0024 26.3908 16.2425 26.0082 16.7227C24.3283 18.8313 20.182 23.321 15.3332 23.321C10.4844 23.321 6.33814 18.8313 4.6582 16.7227C4.27562 16.2425 4.08432 16.0024 4.08432 15.6527C4.08432 15.3031 4.27562 15.0629 4.6582 14.5827C6.33814 12.4741 10.4844 7.98438 15.3332 7.98438C20.182 7.98438 24.3283 12.4741 26.0082 14.5827Z"
                                stroke="#CCD2E3" stroke-width="2"/>
                            </svg>
                        </a>
                    </span>
                </div>
            @endforeach
            {{$tickets->links() }}
        </div>
    </div>
</div>
@push('title' , 'تیکت ها')
