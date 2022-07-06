<?php

namespace App\Http\Livewire\Admin\Setting;

use App\Models\Setting;
use Livewire\Component;

class PublicFormEn extends Component
{

    public array $setting = [];

    public $settingTabEn = 'seo';

    protected $queryString = ['settingTabEn'];

    public function mount()
    {
        $setting = Setting::query()->whereIn('name', ['siteDescriptionEn', 'siteTitleEn', 'siteLogosEn', 'footerEn', 'siteLongTitleEn'])->get();
        foreach ($setting as $item) {
            $this->setting[$item->name] = $item->value;
        }
    }

    public function render()
    {
        return view('livewire.admin.setting.public-form-en');
    }

    public function submit()
    {
        foreach ($this->setting as $key => $item) {
            $setting = Setting::query()->where('name', $key)->first();
            if (!empty($setting)) {
                $setting->update([
                    'value' => $item
                ]);
            }
        }

        $this->dispatchBrowserEvent('toast-message', ['message' => 'تنظیمات اعمال شد.', 'icon' => 'success']);
    }
}
