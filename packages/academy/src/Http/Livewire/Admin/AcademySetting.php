<?php


namespace Packages\academy\src\Http\Livewire\Admin;

use App\Models\Post;
use App\Models\Setting;
use Livewire\Component;
class AcademySetting extends Component
{
    public array $setting = [];

    public function mount() {
        $setting = Setting::query()->whereIn('name' , [ 'rial' , 'expireLearning'])->get();
        foreach ($setting as $item) {
            if ($item->name == 'rial') {
                $this->setting[$item->name] = (bool)$item->value;
                continue;
            }
            $this->setting[$item->name] = $item->value;
        }
    }

    public function render()
    {
        $pages = Post::query()->where('post_type' , 'page')->get();
        return view('academy::livewire.admin.academy-setting' , compact('pages'));
    }

    public function submit()
    {
        foreach ($this->setting as $key => $value) {
            $setting = Setting::query()->where('name' , $key)->first();

            if (!empty($setting)) {
                $setting->update([
                    'value' => $value
                ]);
            }
        }

        $this->dispatchBrowserEvent('toastMessage' , ['message' => 'تنظیمات اعمال شد.' , 'icon' => 'success']);
    }

}
