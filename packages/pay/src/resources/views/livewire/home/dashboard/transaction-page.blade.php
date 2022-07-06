<div>

    <x-parnas.loading wire:loading></x-parnas.loading>
    @if($transactions->isNotEmpty())
        <div class="courses-dashboard">
            <div class="title-courses-dashboard">
                <i class="icon-circle"></i>
                <h2>تراکنش ها</h2>
            </div>
            <div class="list-courses-dashboard">
                <div class="header-courses">
                    <span>شناسه پرداخت</span>
                    <span>تاریخ</span>
                    <span>مبلغ پرداختی</span>
                    <span>وضعیت</span>
                    <span></span>
                </div>
                @foreach($transactions as $transaction)
                <div class="body-courses">
                    <span>{{ isset($transaction->details['referenceId']) ? $transaction->details['referenceId'] : '-' }}</span>
                    <span>{{ jdate($transaction->created_at)->format('Y/m/d H:i') }}</span>
                    <span>{{ number_format($transaction->amount) }}</span>
                    <span>{{ $transaction->status->label }}</span>
                    <span></span>
                </div>
                @endforeach
                {{ $transactions->links() }}
            </div>
        </div>

    @else
        <div class="box-empty">
            <svg class="svg-transaction" id="Outline" viewBox="0 0 24 24" width="45" height="45"><path d="M16,0H8A5.006,5.006,0,0,0,3,5V23a1,1,0,0,0,1.564.825L6.67,22.386l2.106,1.439a1,1,0,0,0,1.13,0l2.1-1.439,2.1,1.439a1,1,0,0,0,1.131,0l2.1-1.438,2.1,1.437A1,1,0,0,0,21,23V5A5.006,5.006,0,0,0,16,0Zm3,21.1-1.1-.752a1,1,0,0,0-1.132,0l-2.1,1.439-2.1-1.439a1,1,0,0,0-1.131,0l-2.1,1.439-2.1-1.439a1,1,0,0,0-1.129,0L5,21.1V5A3,3,0,0,1,8,2h8a3,3,0,0,1,3,3Z"></path><rect x="7" y="8" width="10" height="2" rx="1"></rect><rect x="7" y="12" width="8" height="2" rx="1"></rect></svg>
            <p>تراکنشی انجام نشده</p>
        </div>
    @endif
</div>
@push('title' , 'تراکنش ها')
