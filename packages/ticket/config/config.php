<?php
return [
    'enums' => [
        'types' => [
            array('name' => 'ticket' , 'label' => 'پرداخت' , 'id' => 5)
        ]
    ],
    'sidebar' => [
        'title' => 'تیکت ها',
        'icon' => '<svg width="20" height="20" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M39.1594 16.1289C39.1594 12.3577 39.1594 10.4721 37.9878 9.30048C36.8163 8.12891 34.9306 8.12891 31.1594 8.12891H16.5625C12.7913 8.12891 10.9056 8.12891 9.73407 9.30048C8.5625 10.4721 8.5625 12.3577 8.5625 16.1289V36.8022C8.5625 37.745 8.5625 38.2164 8.85539 38.5093C9.14829 38.8022 9.61969 38.8022 10.5625 38.8022H31.1594C34.9306 38.8022 36.8163 38.8022 37.9878 37.6306C39.1594 36.4591 39.1594 34.5735 39.1594 30.8022V16.1289Z" stroke="#A9B0A6" stroke-width="2"/>
        <path d="M18.125 19.6309L29.5988 19.6309" stroke="#A9B0A6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M18.125 27.3008H23.8619" stroke="#A9B0A6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>',
        'route' => 'admin.tickets.index',
        'links' => array(),
        'can' => 'tickets.read',
        'order' => 3,
        'notification' => 'tickets'
    ],
    'defaults' => [
        'statuses' => [
            array('name' => 'new', 'type' => 5, 'label' => 'تیکت جدید', 'color' => '#4BB543'),
            array('name' => 'checking', 'type' => 5, 'label' => 'بررسی کارشناس', 'color' => '#FFCC00'),
            array('name' => 'user_answer', 'type' => 5, 'label' => 'پاسخ کاربر', 'color' => '#FFCC00'),
            array('name' => 'admin_answer', 'type' => 5, 'label' => 'پاسخ کارشناس', 'color' => '#FFCC00'),
            array('name' => 'close', 'type' => 5, 'label' => 'بسته شده', 'color' => '#FFCC00'),
        ],
        'permission' => array(
            array('id' => 55,'name' => 'tickets.read', 'label' => 'دیدن تیکت ها'),
            array('id' => 56,'name' => 'tickets.create', 'label' => 'ایجاد تیکت'),
            array('id' => 57,'name' => 'tickets.edit', 'label' => 'ویرایش تیکت'),
            array('id' => 58,'name' => 'tickets.delete', 'label' => 'حذف تیکت'),
        ),
        'permission_role' => array(
            array('role_id' => 1, 'permission_id' => [55 , 56 , 57 , 58]),
        )
    ],
];
