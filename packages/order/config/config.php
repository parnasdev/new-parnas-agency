<?php
return [
    'enums' => [
        'types' => [
            array('name' => 'order' , 'label' => 'سفارشات' , 'id' => 4)
        ],
        'status' => [
            'complete' => 10,
            'waitforpay' => 11,
            'doing' => 12,
            'waitforcheck' => 13,
            'cancel' => 9,
            'sendResit' => 15,
        ]
    ],
    'sidebar' => [
        'title' => 'سفارش ها',
        'icon' => '<svg width="20" height="20" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M28.7596 11.35C28.6657 11.2402 28.5492 11.1521 28.418 11.0917C28.2868 11.0313 28.144 11 27.9996 11H21.9996V7C21.9996 6.20435 21.6835 5.44129 21.1209 4.87868C20.5583 4.31607 19.7953 4 18.9996 4H12.9996C12.204 4 11.4409 4.31607 10.8783 4.87868C10.3157 5.44129 9.99961 6.20435 9.99961 7V11H3.99961C3.85465 10.9984 3.71107 11.0283 3.57882 11.0876C3.44657 11.147 3.3288 11.2344 3.23368 11.3438C3.13855 11.4531 3.06835 11.5819 3.02794 11.7211C2.98752 11.8603 2.97785 12.0067 2.99961 12.15L4.87961 24.3C4.95193 24.7769 5.19417 25.2116 5.5617 25.524C5.92923 25.8364 6.39728 26.0055 6.87961 26H25.1396C25.6219 26.0055 26.09 25.8364 26.4575 25.524C26.825 25.2116 27.0673 24.7769 27.1396 24.3L28.9996 12.15C29.0196 12.0072 29.0086 11.8618 28.9671 11.7237C28.9257 11.5857 28.8549 11.4582 28.7596 11.35V11.35ZM11.9996 7C11.9996 6.73478 12.105 6.48043 12.2925 6.29289C12.48 6.10536 12.7344 6 12.9996 6H18.9996C19.2648 6 19.5192 6.10536 19.7067 6.29289C19.8942 6.48043 19.9996 6.73478 19.9996 7V11H11.9996V7ZM25.1396 24H6.85961L5.16961 13H26.8296L25.1396 24Z" fill="#A9B0A6"/>
</svg>',
        'route' => 'admin.orders.index',
        'links' => array(),
        'can' => 'orders.read',
        'order' => 3,
        'notification' => 'today_order'
    ],
    'sidebar2' => [
        'title' => 'تخفیف ها',
        'icon' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M12.79 21.0009L3 11.2109V13.2109C3 13.7409 3.21 14.2509 3.59 14.6209L11.38 22.4109C12.16 23.1909 13.43 23.1909 14.21 22.4109L20.42 16.2009C21.2 15.4209 21.2 14.1509 20.42 13.3709L12.79 21.0009Z" fill="#A9B0A6"/>
<path d="M11.38 17.41C11.77 17.8 12.28 18 12.79 18C13.3 18 13.81 17.8 14.2 17.41L20.41 11.2C21.19 10.42 21.19 9.15 20.41 8.37L12.62 0.58C12.25 0.21 11.74 0 11.21 0H5C3.9 0 3 0.9 3 2V8.21C3 8.74 3.21 9.25 3.59 9.62L11.38 17.41V17.41ZM5 2H11.21L19 9.79L12.79 16L5 8.21V2Z" fill="#A9B0A6"/>
<path d="M7.25 5.5C7.94036 5.5 8.5 4.94036 8.5 4.25C8.5 3.55964 7.94036 3 7.25 3C6.55964 3 6 3.55964 6 4.25C6 4.94036 6.55964 5.5 7.25 5.5Z" fill="#A9B0A6"/>
</svg>',
        'route' => 'admin.discounts.index',
        'links' => array(),
        'can' => 'discounts.read',
        'order' => 3
    ],
    'defaults' => [
        'statuses' => [
            array('name' => 'complete', 'type' => 4, 'label' => 'تکمیل', 'color' => '#0bb30b'),
            array('name' => 'waitforpay', 'type' => 4, 'label' => 'منتظر پرداخت', 'color' => '#FFCC00'),
            array('name' => 'doing', 'type' => 4, 'label' => 'در حال ارسال', 'color' => '#FFCC00'),
            array('name' => 'waitforcheck', 'type' => 4, 'label' => 'در حال بررسی', 'color' => '#FFCC00'),
            array('name' => 'sendResit', 'type' => 4, 'label' => 'ارسال رسید', 'color' => '#FFCC00'),
        ],
        'permission' => array(
            array('id' => 47,'name' => 'orders.read', 'label' => 'دیدن سفارشات'),
            array('id' => 48,'name' => 'orders.create', 'label' => 'ایجاد سفارشات'),
            array('id' => 49,'name' => 'orders.edit', 'label' => 'ویرایش سفارشات'),
            array('id' => 50,'name' => 'orders.delete', 'label' => 'حذف سفارشات'),
            array('id' => 63,'name' => 'discounts.read', 'label' => 'دیدن تخفیف ها'),
            array('id' => 64,'name' => 'discounts.create', 'label' => 'ایجاد تخفیف ها'),
            array('id' => 65,'name' => 'discounts.edit', 'label' => 'ویرایش تخفیف ها'),
            array('id' => 66,'name' => 'discounts.delete', 'label' => 'حذف تخفیف ها'),
        ),
        'permission_role' => array(
            array('role_id' => 1, 'permission_id' => [47 , 48 , 49 , 50 , 63, 64 , 65 , 66]),
        ),
        'settings' => [
            'order_type' => 'academy'
        ]
    ]
];
