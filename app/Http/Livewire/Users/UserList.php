<?php

namespace App\Http\Livewire\Users;

use App\Queries\Users\UsersCollection;
use App\Http\Traits\Paginator;
use Livewire\Component;

class UserList extends Component
{
    use Paginator;

    // Search query.
    public $search = '';

    // Query strings.
    protected $queryString = [ 'paginate' ];

    /**
     * Reset page upon update to search.
     * 
     * @return void
     */
    public function updatedSearch ()
    {
        $this->resetPage();
    }

    /**
     * Get all users.
     * 
     * @param $query
     * @return Collection
     */
    public function getRowsProperty ()
    {
        $query = UsersCollection::get([
            'search' => $this->search
        ]);

        return $this->perPagePagination($query);
    }

    /**
     * Render the Livewire component.
     * 
     * @return Livewire\Component
     */
    public function render ()
    {
        return view('livewire.users.user-list')
            ->with('users', $this->rows);
    }
}
