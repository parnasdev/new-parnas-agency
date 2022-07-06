<?php


namespace Packages\academy\src\DTO;


class ArvanVideos
{
    public string|null $id;
    public string|null $title;
    public string|null $description;
    public $file_info;
    public $created_at;
    public $updated_at;
    public $completed_at;
    public $parallel_convert;
    public $directory_size;
    public $options;
    public $config_url;
    public $mp4_videos;
    public $hls_playlist;
    public $dash_playlist;
    public $thumbnail_url;
    public $tooltip_url;
    public $video_url;
    public $player_url;
    public $channel;

    public function __construct($data = null)
    {
        if (!is_null($data)) {
            $this->id = $data->id;
            $this->title = $data->title;
            $this->description = $data->description;
            $this->file_info = $data->file_info;
            $this->created_at = $data->created_at;
            $this->updated_at = $data->updated_at;
            $this->completed_at = $data->completed_at;
            $this->parallel_convert = $data->parallel_convert;
            $this->directory_size = $data->directory_size;
            $this->options = $data->options;
            $this->config_url = $data->config_url;
            $this->mp4_videos = $data->mp4_videos;
            $this->hls_playlist = $data->hls_playlist;
            $this->dash_playlist = $data->dash_playlist;
            $this->thumbnail_url = $data->thumbnail_url;
            $this->tooltip_url = $data->tooltip_url;
            $this->video_url = $data->video_url;
            $this->player_url = $data->player_url;
            $this->channel = $data->channel;
        }
    }
}
