<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class TutorialPage extends Component
{
    public $video = 'k23l';

    protected $queryString = ['video'];

    public $courses = [
        array(
            'id' => 1,
            'title' => 'بخش اول',
            'subtitle' => 'معرفی پنل آکادمی',
        ),
        array(
            'id' => 2,
            'title' => 'بخش دوم',
            'subtitle' => 'نوشته ها',
        ),
        array(
            'id' => 3,
            'title' => 'بخش سوم',
            'subtitle' => 'تیکت ها',
        ),
    ];

    public $episodes = [
        array(
            'course_id' => 1,
            'id' => 'k23l',
            'title' => 'قسمت اول',
            'subtitle' => 'معرفی و آشنایی با داشبورد',
            'video' => '<div class="r1_iframe_embed"><iframe
                                        src="https://player.arvancloud.com/index.html?config=https://parnas-video.arvanvod.com/3G4kZo2JEZ/n4qVNMAYRB/origin_config.json"
                                        style="border:0 #ffffff none;" name="Dashboard.mp4" frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowFullScreen="true" webkitallowfullscreen="true"
                                        mozallowfullscreen="true"></iframe></div>'
        ),
        array(
            'course_id' => 2,
            'id' => 'k24l',
            'title' => 'قسمت اول',
            'subtitle' => 'برچسب ها و دسته بندی',
            'video' => '<div class="r1_iframe_embed"><iframe src="https://player.arvancloud.com/index.html?config=https://parnas-video.arvanvod.com/3G4kZo2JEZ/jVBLV2LMe8/origin_config.json" style="border:0 #ffffff none;" name="post(category-tag).mp4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>'
            ),
            array(
                'course_id' => 2,
                'id' => 'k25l',
                'title' => 'قسمت دوم',
                'subtitle' => 'اضافه کردن یک نوشته',
                'video' => '<div class="r1_iframe_embed"><iframe src="https://player.arvancloud.com/index.html?config=https://parnas-video.arvanvod.com/3G4kZo2JEZ/oq5g6Jgb61/origin_config.json" style="border:0 #ffffff none;" name="post(insert).mp4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>'
                ),
            array(
                'course_id' => 2,
                'id' => 'k26l',
                'title' => 'قسمت سوم',
                'subtitle' => 'ویرایش یک نوشته',
                'video' => '<div class="r1_iframe_embed"><iframe src="https://player.arvancloud.com/index.html?config=https://parnas-video.arvanvod.com/3G4kZo2JEZ/o6v309RWdy/origin_config.json" style="border:0 #ffffff none;" name="post(edit).mp4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>'
                ),
            array(
                'course_id' => 2,
                'id' => 'k27l',
                'title' => 'قسمت چهارم',
                'subtitle' => 'حذف یک نوشته',
                'video' => '<div class="r1_iframe_embed"><iframe src="https://player.arvancloud.com/index.html?config=https://parnas-video.arvanvod.com/3G4kZo2JEZ/19zqOyENjv/origin_config.json" style="border:0 #ffffff none;" name="post(delete).mp4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>'
                ),
        array(
            'course_id' => 3,
            'id' => 'k28l',
            'title' => 'قسمت اول',
            'subtitle' => 'مدیریت تیکت ها',
            'video' => '<div class="r1_iframe_embed"><iframe src="https://player.arvancloud.com/index.html?config=https://parnas-video.arvanvod.com/3G4kZo2JEZ/PqWaeOK1rp/origin_config.json" style="border:0 #ffffff none;" name="ticket.mp4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>'
            )

    ];

    public function render()
    {
        return view('livewire.admin.tutorial-page');
    }

    public function openVideo($id) {
        $this->video = $id;
    }
}
