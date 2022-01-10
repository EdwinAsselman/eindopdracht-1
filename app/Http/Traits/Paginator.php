<?php

namespace App\Http\Traits;

use Livewire\WithPagination;

trait Paginator
{
    use WithPagination;

    // Pagination.
    public $paginate = 10;

    /**
     * Reset page when pagination is updated.
     * 
     * @return void
     */
    public function updatedPaginate ()
    {
        $this->resetPage();
    }

    /**
     * Return paginated result of query.
     * 
     * @return Collection
     */
    public function perPagePagination ($query)
    {
        return $query->paginate($this->paginate);
    }
}
