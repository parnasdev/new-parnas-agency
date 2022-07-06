<div>
    <x-parnas.loading wire:loading></x-parnas.loading>
    <div class="courses-dashboard">
        <div class="title-courses-dashboard">
            <i class="icon-circle"></i>
            <h2>ایجاد تیکت</h2>

        </div>
        <form wire:submit.prevent="submit">
            <div class="mb-2">
                <label class="label-ticket" for="">عنوان تیکت</label>
                <input  type="text" class="form-control inp-ticket" wire:model.defer="ticket.title">
                @error('ticket.title')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2">
                <label class="label-ticket" for="">متن</label>
                <textarea class="form-control textarea-ticket" rows="5" wire:model.defer="ticket.body"></textarea>
                @error('ticket.body')
                <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2">
                <label class="label-ticket" for="">فایل</label>
                <input type="file" class="form-control inp-ticket" wire:model.defer="file">
                @error('file')
                <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2">
                <button class="btn-submit-ticket">
                    <i class="icon-circle"></i>
                    ارسال
                </button>
            </div>
        </form>
    </div>
</div>
@push('title' , 'ایجاد تیکت')
