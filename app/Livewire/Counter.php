<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count=0;

    public function render()
    {
        return <<<'HTML'
        <div>
        <h1>{{ $count }}</h1>
        <button wire:click="increment">+</button>
        <button wire:click="decrement">-</button>
        </div>
        HTML;
    }
    function increment()
    {
        $this->count++;
    }
    function decrement()
    {
        $this->count--;
    }
}
