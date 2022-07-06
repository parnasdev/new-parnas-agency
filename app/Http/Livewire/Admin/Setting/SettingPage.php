<?php

namespace App\Http\Livewire\Admin\Setting;

use App\Models\Setting;
use Livewire\Component;

class SettingPage extends Component
{

    public string $tab = 'general';
    public string $homeTab = 'sectionOne';

    public string $lang = 'fa';

    protected $queryString = ['tab', 'homeTab' , 'lang'];


    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.admin.setting.setting-page');
    }


}
