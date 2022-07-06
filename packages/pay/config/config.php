<?php
return [
    'enums' => [
        'types' => [
            array('name' => 'payment' , 'label' => 'پرداخت' , 'id' => 3)
        ],
        'status' => [
            'successful' => 7,
            'unsuccessful' => 8,
            'cancel' => 9,
        ],
        'banks' => array(
            array(
                'name' => 'بانک ملّی ایران',
                'code' => array('603799'),
                'logo' => '/images/bankLogo/logoMeli.png'
            ),
            array(
                'name' => 'بانک سپه',
                'code' => array('589210'),
                'logo' => '/images/bankLogo/logoSepah.png'
            ),
            array(
                'name' => 'بانک صنعت ومعدن',
                'code' => array('637961'),
                'logo' => '/images/bankLogo/logoSanaateAndMadan.png'
            ),
            array(
                'name' => 'بانک کشاورزی',
                'code' => array('603770' , '639217'),
                'logo' => '/images/bankLogo/logoKeshavrzi.png'
            ),
            array(
                'name' => 'بانک مسکن',
                'code' => array('628023'),
                'logo' => '/images/bankLogo/logomaskan.png'
            ),
            array(
                'name' => 'بانک توسعه صادرات ایران',
                'code' => array('627648' , '207177'),
                'logo' => '/images/bankLogo/logoExportDevelopmentBankOfIran.png'
            ),
            array(
                'name' => 'بانک توسعه تعاون',
                'code' => array('502908'),
                'logo' => '/images/bankLogo/logoToseeTavon.png'
            ),
            array(
                'name' => 'پست بانک ایران',
                'code' => array('627760'),
                'logo' => '/images/bankLogo/logoPostBank.png'
            ),
            array(
                'name' => 'بانک اقتصاد نوین',
                'code' => array('627412'),
                'logo' => '/images/bankLogo/logoEnBank.png'
            ),
            array(
                'name' => 'بانک پارسیان',
                'code' => array('622106' , '639194' , '627884'),
                'logo' => '/images/bankLogo/logoParsianBank.png'
            ),
            array(
                'name' => 'بانک کارآفرین',
                'code' => array('627488' , '502910'),
                'logo' => '/images/bankLogo/logoKarAfarin.png'
            ),
            array(
                'name' => 'بانک سامان',
                'code' => array('621986'),
                'logo' => '/images/bankLogo/logoSamanBank.png'
            ),
            array(
                'name' => 'بانک سینا',
                'code' => array('639346'),
                'logo' => '/images/bankLogo/logoSinaBank.png'
            ),
            array(
                'name' => 'بانک شهر',
                'code' => array('502806'),
                'logo' => '/images/bankLogo/logoSharBank.png'
            ),
            array(
                'name' => 'بانک دی',
                'code' => array('502938'),
                'logo' => '/images/bankLogo/logoDeBank.png'
            ),
            array(
                'name' => 'بانک صادرات',
                'code' => array('603769'),
                'logo' => '/images/bankLogo/logoSaderatBank.png'
            ),
            array(
                'name' => 'بانک ملت',
                'code' => array('610433'),
                'logo' => '/images/bankLogo/logoBankMellat.png'
            ),
            array(
                'name' => 'بانک تجارت',
                'code' => array('627353'),
                'logo' => '/images/bankLogo/logoTejaratBank.png'
            ),
            array(
                'name' => 'بانک رفاه',
                'code' => array('589463'),
                'logo' => '/images/bankLogo/logorefah.png'
            ),
            array(
                'name' => 'بانک حکمت ایرانیان',
                'code' => array('636949'),
                'logo' => '/images/bankLogo/logoBankHekmatIranian.png'
            ),
            array(
                'name' => 'بانک گردشکری',
                'code' => array('505416'),
                'logo' => '/images/bankLogo/logoRar_bgardeshgari.png'
            ),
            array(
                'name' => 'بانک ایران زمین',
                'code' => array('505785'),
                'logo' => '/images/bankLogo/logoZaminBank.png'
            ),
            array(
                'name' => 'بانک قوامین',
                'code' => array('639599'),
                'logo' => '/images/bankLogo/logoGavamin.png'
            ),
            array(
                'name' => 'بانک انصار',
                'code' => array('627381'),
                'logo' => '/images/bankLogo/logoAnsarBank.png'
            ),
            array(
                'name' => 'بانک سرمایه',
                'code' => array('639607'),
                'logo' => '/images/bankLogo/logoBankSarmaye.png'
            ),
            array(
                'name' => 'بانک پاسارگاد',
                'code' => array('639347' , '502229'),
                'logo' => '/images/bankLogo/logoBankPasargard.png'
            ),
        ),
    ],
    'sidebar' => [
        'title' => 'پرداخت ها',
        'route' => 'admin.payments.index',
        'icon' => '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M13.5 13C13.3674 13 13.2402 13.0527 13.1464 13.1464C13.0527 13.2402 13 13.3674 13 13.5C13 13.6326 13.0527 13.7598 13.1464 13.8536C13.2402 13.9473 13.3674 14 13.5 14H15.5C15.6326 14 15.7598 13.9473 15.8536 13.8536C15.9473 13.7598 16 13.6326 16 13.5C16 13.3674 15.9473 13.2402 15.8536 13.1464C15.7598 13.0527 15.6326 13 15.5 13H13.5ZM2 6.5C2 5.83696 2.26339 5.20107 2.73223 4.73223C3.20107 4.26339 3.83696 4 4.5 4H15.5C16.163 4 16.7989 4.26339 17.2678 4.73223C17.7366 5.20107 18 5.83696 18 6.5V13.5C18 14.163 17.7366 14.7989 17.2678 15.2678C16.7989 15.7366 16.163 16 15.5 16H4.5C3.83696 16 3.20107 15.7366 2.73223 15.2678C2.26339 14.7989 2 14.163 2 13.5V6.5ZM3 13.5C3 13.8978 3.15804 14.2794 3.43934 14.5607C3.72064 14.842 4.10218 15 4.5 15H15.5C15.8978 15 16.2794 14.842 16.5607 14.5607C16.842 14.2794 17 13.8978 17 13.5V9H3V13.5ZM17 6.5C17 6.10218 16.842 5.72064 16.5607 5.43934C16.2794 5.15804 15.8978 5 15.5 5H4.5C4.10218 5 3.72064 5.15804 3.43934 5.43934C3.15804 5.72064 3 6.10218 3 6.5V8H17V6.5Z" fill="#A9B0A6"/>
</svg>',
        'links' => array(

        ),
        'can' => 'payments.read',
        'order' => 3
    ],
    'defaults' => [
        'statuses' => [
            array('name' => 'successful', 'type' => 3, 'label' => 'پرداخت موفق', 'color' => '#4BB543'),
            array('name' => 'unsuccessful', 'type' => 3, 'label' => 'پرداخت ناموفق', 'color' => '#FFCC00'),
            array('name' => 'cancel', 'type' => 3, 'label' => 'لغو پرداخت', 'color' => '#FFCC00'),
        ],
        'permission' => array(
            array('id' => 41,'name' => 'payments.read', 'label' => 'دیدن تراکنش ها'),
            array('id' => 42,'name' => 'payments.setting', 'label' => 'تنظیمات پرداخت ها'),
        ),
        'permission_role' => array(
            array('role_id' => 1, 'permission_id' => [41 , 42]),
        ),
        'settings' => [
           'ports' => ['zarinpal'],
           'atmCart' => [
               'active' => false,
               'items' => []
           ]
        ]
    ],
];
