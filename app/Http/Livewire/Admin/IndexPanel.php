<?php

namespace App\Http\Livewire\Admin;

use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Morilog\Jalali\Jalalian;

class IndexPanel extends Component
{

    public array $visitData = [];

    public array $transactionWeekData = [];

    public array $transactionMonthData = [];


    public function mount()
    {
        $this->visitData[] = Visit::query()->whereDay('updated_at' , now())->get()->count();
        $this->visitData[] = Visit::query()->whereBetween('updated_at', [now()->startOfWeek(), now()->endOfWeek()])->get()->count();
        $this->visitData[] = Visit::query()->whereMonth('updated_at' , now())->get()->count();
        $this->visitData[] = Visit::query()->whereYear('updated_at' , now())->get()->count();



    
 

//
//        $uploads = collect(File::allFiles(public_path('/uploads')))->sortBy(function ($file) {
//            return $file->getCTime();
//        });
//
//        dd($uploads);

    }

    public function render()
    {
        return view('livewire.admin.index-panel');
    }

    public function getStartEndWeekDate($now)
    {
       return match (true) {
            $now->isSaturday() => $this->getDates(0 , $now),
            $now->isSunday() => $this->getDates(1 , $now),
            $now->isMonday() => $this->getDates(2 , $now),
            $now->isTuesday() => $this->getDates(3 , $now),
            $now->isWednesday() => $this->getDates(4 , $now),
            $now->isThursday() => $this->getDates(5 , $now),
            $now->isFriday() => $this->getDates(6 , $now),
        };
    }

    private function getDates($day , $now) {

        $start = $now;

        if ($day != 0) {
            $start = $now->subDays($day);
        }

        $end = $start->addDays(6);

        return [$start->toCarbon()->format('Y-m-d H:i:s') , $end->toCarbon()->format('Y-m-d H:i:s')];
    }

    public function upload_images()
    {
        $this->emit('getData_fileManager' , ['type' => 'image']);
        $this->dispatchBrowserEvent('open-modal', ['name' => 'uploader']);
    }

}
