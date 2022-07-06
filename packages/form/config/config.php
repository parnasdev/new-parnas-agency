<?php
return [
    'enums' => [],
    'input' => array(
        'id' => null,
        'label' => null,
        'rules' => [],
        'controlType' => 'textbox',
        'type' => 'text',
        'options' => '',
        'multiple' => '0',
        'order' => 1,
    ),
    'sidebar' => [
        'title' => 'فرم ها',
        'icon' => '<svg width="17" height="17" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M33.05 7H38C38.5304 7 39.0391 7.21071 39.4142 7.58579C39.7893 7.96086 40 8.46957 40 9V42C40 42.5304 39.7893 43.0391 39.4142 43.4142C39.0391 43.7893 38.5304 44 38 44H10C9.46957 44 8.96086 43.7893 8.58579 43.4142C8.21071 43.0391 8 42.5304 8 42V9C8 8.46957 8.21071 7.96086 8.58579 7.58579C8.96086 7.21071 9.46957 7 10 7H17V10H31V7H33.05Z" stroke="#A9B0A6" stroke-width="4" stroke-linejoin="round"/>
                    <path d="M27 19L19 27.001H29.004L21 35.001M17 4H31V10H17V4Z" stroke="#A9B0A6" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>',
        'route' => 'admin.forms.index',
        'links' => array(),
        'can' => 'forms.read',
        'order' => 3
    ],
    'defaults' => [
        'permission' => array(
            array('id' => 51,'name' => 'forms.read', 'label' => 'خواندن فرم ها'),
            array('id' => 52,'name' => 'forms.create', 'label' => 'ایجاد فرم ها'),
            array('id' => 53,'name' => 'forms.edit', 'label' => 'ویرایش فرم ها'),
            array('id' => 54,'name' => 'forms.delete', 'label' => 'حذف فرم ها'),
        ),
        'permission_role' => array(
            array('role_id' => 1, 'permission_id' => [51 , 52 , 53 , 54]),
        ),
    ],

];
