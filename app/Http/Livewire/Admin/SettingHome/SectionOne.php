<?php

namespace App\Http\Livewire\Admin\SettingHome;

use App\Http\Extra\DynamicFunction;
use App\Models\Setting;
use Livewire\Component;

class SectionOne extends Component
{
    use DynamicFunction;
    protected $listeners = ['setData', 'getFile'];
    public array|null $item = null;
    public int|null $index = null;
    public int|null $index1 = null;
    public string|null $direction = null;

    public string $lang;

    public function mount()
    {
        if ($this->lang == 'en') {
            $this->item = config('options.sectionOneEn');
        } else {
            $this->item = config('options.sectionOne');
        }

    }

    public function render()
    {
        return view('livewire.admin.setting-home.section-one');
    }

    public function updated($name)
    {
        if ($name == 'lang') {
            if ($this->lang == 'en') {
                $this->item = config('options.sectionOneEn');
            } else {
                $this->item = config('options.sectionOne');
            }
        }
    }


    public function close()
    {
        $this->dispatchBrowserEvent('close-modal');
        $this->index = null;
        $this->index1 = null;
        $this->direction = null;
        $this->item = null;
    }

    public function setData($e)
    {
        list($this->index, $this->index1, $this->direction, $this->item) = $e;
    }

    public function convert($name)
    {
        $types = collect(config('pagebuilder.types'));

        return $types->get($name) ?? ['type' => '-', 'label' => '-'];
    }

    public function submit()
    {
        Setting::query()->where('name' , $this->lang == 'fa' ? 'sectionOne' : 'sectionOneEn')->first()->update([
            'value' => $this->item
        ]);

        $this->dispatchBrowserEvent('toast-message' , ['message' => 'تنظیمات اعمال شد.' , 'icon' => 'success']);

    }

    public function getFile($e)
    {
        $this->fill([$e['input'] => url($e['value'])]);
    }
}
