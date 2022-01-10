<?php

namespace App\Http\Livewire\Bands;

use App\Models\Band;
use App\Queries\Bands\BandsCollection;
use App\Http\Traits\Paginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class BandList extends Component
{
    use Paginator;

    // Search query.
    public $search = '';

    public $selected;

    public $showDeleteModal = false;

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
     * Show deletion modal.
     * 
     * @param $bandId
     * @return void
     */
    public function showDeleteModal ($bandId)
    {
        $this->selected = $this->getBand($bandId);

        $this->showDeleteModal = ! $this->showDeleteModal;
    }

    /**
     * Return the band name by its given id.
     * 
     * @param $bandId
     * @return string
     */
    private function getBand ($bandId)
    {
        try {
            
            $band = Band::findOrFail($bandId);
        } catch (ModelNotFoundException $err) {
            
            abort(404);
        }

        return $band;
    }

    /**
     * Delete selected band.
     * 
     * @return void
     */
    public function deleteSelected ()
    {
        $this->showDeleteModal = false;

        $this->selected->delete();

        $this->dispatchBrowserEvent('message', [ 'message' => 'Band is verwijderd!' ]);
    }

    /**
     * Get all bands.
     * 
     * @param $query
     * @return Collection
     */
    public function getRowsProperty ()
    {
        $query = BandsCollection::get([
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
        return view('livewire.bands.band-list')
            ->with('bands', $this->rows);
    }
}
