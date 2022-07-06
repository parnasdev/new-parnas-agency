<?php

namespace App\Http\Livewire\Admin\Setting;

use App\Models\Post;
use App\Models\PostFile;
use App\Models\Setting;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class PublicForm extends Component
{
    public array $setting = [];

    public $settingTab = 'seo';

    protected $queryString = ['settingTab'];

    public function mount()
    {
        $setting = Setting::query()->whereIn('name', ['siteDescription', 'siteTitle', 'siteLogos', 'footer', 'favicon', 'metas', 'separator', 'siteLongTitle'])->get();
        foreach ($setting as $item) {
            $this->setting[$item->name] = $item->value;
        }
    }

    public function render()
    {
        return view('livewire.admin.setting.public-form');
    }

    public function syncUrls()
    {
        $currentURL = explode('//', env('APP_URL'))[1];
        $links = PostFile::query()->select('url', 'id')->get();
        foreach ($links as $link) {
            $newUrl = str_replace(explode('/', $link->url)[2], $currentURL, $link->url);
            $link->url = $newUrl;
            $link->save();
        }
        $this->dispatchBrowserEvent('toast-message', ['message' => 'لینک ها با موفقیت تغییر یافتند', 'icon' => 'success']);
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
