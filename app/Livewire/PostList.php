<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;

class PostList extends Component
{
    use WithPagination;
    #[Url]
    public $sort='desc';
    #[Url]
    public $search='';

    public function setSort($sort)
    {
        $this->sort=($sort === 'desc') ? 'desc' : 'asc';
    }

    #[On('search')]
    public function updatedSearch($search)
    {
        $this->search=$search;
    }

    #[Computed()]
    public function posts()
    {
        return Post::published()
        ->orderBy('published_at',$this->sort)
        ->where('title','like',"%{$this->search}%")
        ->paginate(4);
    }
    public function render()
    {
        return view('livewire.post-list');
    }
}
