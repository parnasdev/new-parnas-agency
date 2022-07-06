<?php


namespace Packages\academy\src\Http\Livewire\Admin\Arvan;


use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Packages\academy\src\DTO\ArvanVideos;

class ArvanUploader extends Component
{
    protected $listeners = ['setData'];
    public array $file = [];

    public $episodeId = 0;

    public array $request = [
        'title' => '',
        'video_url' => '',
        'convert_mode' => 'auto',

    ];

    public function render()
    {
        $videos = $this->getVideos();
        return view('academy::livewire.admin.arvan.arvan-uploader', compact('videos'));
    }

    public function setData($e)
    {
        $this->file = $e['file'];

        $this->episodeId = $e['id'];

    }

    public function getVideo()
    {
        if ($this->file != '') {
            $response = Http::withoutVerifying()->withHeaders([
                'Authorization' => env('ARVAN_APIKEY')
            ])
                ->get(env('ARVAN_BASEURL') . '/videos/' . $this->file['url'])->body();
        }
    }

    public function getVideos()
    {
        $channel_id = env('arvan_channel');
        $response = Http::withoutVerifying()->withHeaders([
            'Authorization' => env('ARVAN_APIKEY')
        ])
            ->get(env('ARVAN_BASEURL') . "/channels/{$channel_id}/videos")->body();
       $data = collect([]);

       foreach (json_decode($response)->data ?? [] as $item) {
           $data->push(new ArvanVideos($item));
       }
        return $data;
    }

    public function storeVideo()
    {
        $this->validate([
            'request.video_url' => ['required'],
        ]);
        $this->request['title'] = basename($this->request['video_url']);
        $channel_id = env('arvan_channel');
        $response = Http::withoutVerifying()->withHeaders([
            'Authorization' => env('ARVAN_APIKEY')
        ])
            ->post(env('ARVAN_BASEURL') . "/channels/{$channel_id}/videos", $this->request)->body();
        $result = new ArvanVideos(json_decode($response)->data);

        $this->file['url'] = $result->id;
    }

    public function submit()
    {
        $this->emit('fileData', ['file' => $this->file , 'id' => $this->episodeId]);
        $this->request =  [
            'title' => '',
            'video_url' => '',
            'convert_mode' => 'auto',

        ];
        $this->dispatchBrowserEvent('close-modal');
    }
}
