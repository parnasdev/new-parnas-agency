@props(['links' => []])
<div class="addressBarBasket">
    <div class="r">
        <svg width="21" height="25" viewBox="0 0 25.296 29.863">
            <g id="Location" transform="translate(0.781 0.75)">
                <path id="Path_1011" data-name="Path 1011"
                      d="M1.169,15.132a17.588,17.588,0,0,0,4.567,8.9,28.7,28.7,0,0,0,6.048,4.983,2,2,0,0,0,2.168,0A28.7,28.7,0,0,0,20,24.035a17.588,17.588,0,0,0,4.567-8.9,13.5,13.5,0,0,0-1.831-9.238C20.961,3.152,17.842,1,12.867,1S4.773,3.152,3,5.893A13.5,13.5,0,0,0,1.169,15.132Z"
                      transform="translate(-1 -1)" fill="none" stroke="#fff"
                      stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                <circle id="Ellipse_49" data-name="Ellipse 49" cx="4.423" cy="4.423" r="4.423"
                        transform="translate(16.236 16.425) rotate(180)" fill="none"
                        stroke="#fff" stroke-width="1.5"/>
            </g>
        </svg>
        <h6>
            آکادمی مریم صفایی
        </h6>
    </div>
    @foreach($links as $link)
    <div class="main-svg">
        <svg xmlns="http://www.w3.org/2000/svg" width="20.318" height="13.491"
             viewBox="0 0 20.318 13.491">
            <path id="Up_Arrow_2" data-name="Up Arrow 2"
                  d="M0,5.9,5.9,0m0,0V18.87M5.9,0l5.9,5.9"
                  transform="translate(0.849 12.642) rotate(-90)" fill="none" stroke="#c49c74"
                  stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"/>
        </svg>
    </div>
    <a class="active-link-page" href="{{ $link['href'] }}">{{ $link['title'] }}</a>
    @endforeach
</div>
