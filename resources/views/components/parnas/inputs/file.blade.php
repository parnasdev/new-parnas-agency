@props(['file' => null , 'model' => null])
<div class="drop-container mx-8">
    <a href="{{ url('/file-manager/fm-button?model='.$model) }}" class="drop-box flex-70"
       id="iframe-btn" style="height: 110px"
       x-data="
        $($el).fancybox({
            'type'		: 'iframe',
            'autoScale'    	: false
        });
        window.addEventListener('my_event', function(e) {
            let {model , url} = e.detail
            if (model === '{{ $model }}') {
                 $wire.set('{{ $model }}' , url);
            }
            $.fancybox.close();
         }, false);
        ">
        @if ($file)
            <i class="fas fa-file-upload"></i>
            <span>{{ 'فایل انتخاب شد' }}</span>
            <span style="overflow-wrap: anywhere;">{{ $file }}</span>
        @else
            <i class="fas fa-file-alt"></i>
            <span>{{ 'برای انتخاب فایل روی اینحا بزنید!!' }}</span>
        @endif
    </a>
    <input type="hidden" id="myfile">
    {{ $slot ?? null }}
</div>
<style>
    .drop-box {
        display: flex;
        justify-content: center;
        flex-direction: column;
        width: 100%;
        height: 150px;
        align-items: center;
        border: 3px dashed #0a53be;
        color: #fff;
        background-color: rgba(22, 170, 214, .65);
        border-radius: 15px;
        cursor: pointer;
    }

    .drop-box i {
        font-size: 40px;
        margin-bottom: 1rem;
    }

    .drop-box img {
        object-fit: contain;
    }

    .drop-box span {
        font-size: 10px;
    }

    .fancybox-content {
        height: 450px !important;
    }
</style>
