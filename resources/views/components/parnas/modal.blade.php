@props(['lg' => false , 'name' => 'modal' , 'backDrop' => false])
<div class="modal-content modal-data max-width-360" data-action="unload-data" style="display: none;"
     wire:ignore.self
     x-data="{
        name: '{{ $name }}',
        lg: '{{ $lg }}',
        showModal(e) {
            let {name} = e.detail;

            if(name == null || name == undefined) {
                $($el).show();
            } else if(name == this.name) {
                 $($el).show();
            }

        },
        closeModal(e) {
            $($el).hide();
            $wire.emit('closeModal');
        }
    }"
     @open-modal.window="showModal"
     @keydown.esc.window="closeModal()"
     @close-modal.window="closeModal">
    <div class="c-container h-100">
        <div class="c-content {{ $lg ? '' : 'modal-mini' }} h-auto d-flex align-items-center justify-content-center radius-7 scroller" propagation="true">
            <div class="co-data flex-98">
                <div class="d-flex justify-content-between">

                    <div class="text mr-10">
                        <div class="head f-13">
                            <div class="rx-title title-input pb-10 mr-10">
                                <div class="p-rx">
                                    <div class="rx-border-rectangle-after label-input"></div>
                                </div>
                            </div>
                            {{ $title ?? '' }}
                        </div>
                    </div>
                    <div class="close cursor-pointer" @click="closeModal">
                        <svg width="25" height="25" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23.5875 8.36914L8.28906 23.7058" stroke="#ea4141" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8.29139 8.36914L23.5898 23.7058" stroke="#ea4141" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                {{ $slot }}
                <!-- submit Data -->
                <div class="action-btn d-flex justify-content-end pb-10 pt-10">
                   {{ $actions ?? '' }}
                </div>
            </div>
        </div>
    </div>
</div>
