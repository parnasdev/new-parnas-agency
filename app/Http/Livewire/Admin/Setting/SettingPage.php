<?php

namespace App\Http\Livewire\Admin\Setting;

use App\Models\Setting;
use Livewire\Component;

class SettingPage extends Component
{
    public array $indexSetting = [];
    public $file = [
        'url' => null,
        'alt' => null,
    ];
    protected $listeners = ['updatedData'];


    public string $tab = 'general';
    public string $homeTab = 'sectionOne';

    public string $lang = 'fa';

    protected $queryString = ['tab', 'homeTab', 'lang'];


    public function mount()
    {
        // $indexSetting = Setting::query()->where('name', 'indexPage')->first();
        // $indexSetting->update([
        //     'value' => [
        //         'main-banner' => [],
        //         'slider' => [],
        //         'symbols' => [],
        //         'banners' => [],
        //         'faqs' => [],
        //         'description' => [],
        //     ]
        // ]);
        $indexSetting = Setting::query()->whereIn('name', ['indexPage'])->get();
        foreach ($indexSetting as $item) {
            $this->indexSetting[$item->name] = $item->value;
        }
    }
    public function updatedData($e)
    {
        $this->indexSetting['indexPage'][$e['index']] = $e['value'];
    }
    public function render()
    {
        return view('livewire.admin.setting.setting-page');
    }

    public function submit()
    {
        foreach ($this->indexSetting as $key => $item) {
            $setting = Setting::query()->where('name', 'indexPage')->first();
            if (!empty($setting)) {
                $setting->update([
                    'value' => $item
                ]);
            }
        }
        $this->dispatchBrowserEvent('toast-message', ['message' => 'تنظیمات اعمال شد.', 'icon' => 'success']);
    }
}
