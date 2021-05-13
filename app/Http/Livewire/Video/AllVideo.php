<?php

namespace App\Http\Livewire\Video;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Video;
use App\Models\Channel;
use Illuminate\Support\Facades\Storage;


class AllVideo extends Component
{
    use WithPagination;
    use AuthorizesRequests;
    protected $paginationTheme = 'bootstrap';

    public $channel;

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function render()
    {
        return view('livewire.video.all-video')
        ->with('videos',$this->channel->videos()->paginate(3))
        ->extends('layouts.app')
        ;
    }

    public function delete(Video $video)
    {

        $this->authorize('delete', $video);

        $deleted = Storage::disk('videos')->deleteDirectory($video->uid);
        if($deleted)
        {
            $video->delete();
        }

        return back();
    }
}
