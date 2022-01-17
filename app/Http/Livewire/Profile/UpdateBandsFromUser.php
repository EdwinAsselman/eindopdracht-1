<?php

namespace App\Http\Livewire\Profile;

use App\Models\Band;
use App\Queries\Bands\BandsCollection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateBandsFromUser extends Component
{   
    public $addedBands = [];

    protected function rules ()
    {
        return [
            'addedBands.*' => 'required'
        ];
    }

    public function mount ()
    {
        $this->addedBands = Auth::user()->bands()->pluck('id', 'id');
    }

    /**
     * Get all bands.
     * 
     * @return Collection
     */
    public function getRowsProperty ()
    {
        return BandsCollection::get([
            'search' => ''
        ])->get();
    }

    public function addNewBand ()
    {
        $this->addedBands->push([
            0 => ''
        ]);
    }

    public function removeBand ($bandId)
    {
        $this->addedBands->forget($bandId);
    }

    public function save ()
    {
        Auth::user()->bands()->sync($this->addedBands);
    }

    /**
     * Render the Livewire component.
     * 
     * @return Livewire\Component
     */
    public function render ()
    {
        return view('livewire.profile.update-bands-from-user')
            ->with('bands', $this->rows);
    }
}
