<?php

namespace App\Http\Livewire\Custom;

use Livewire\Component;
use Livewire\WithPagination;

class PaginationLinks extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.custom.pagination-links');
    }
}
