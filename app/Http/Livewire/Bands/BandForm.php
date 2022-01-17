<?php

namespace App\Http\Livewire\Bands;

use App\Models\{ 
    Band,
    Video
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class BandForm extends Component
{   
    use WithFileUploads;

    public Band $band;

    public $logo;

    public $videos = [];

    /**
     * Validation rules.
     * 
     * @return array
     */
    protected function rules ()
    {
        return [
            'band.name' => 'required',
            'band.biography' => 'nullable|max:500',
            'band.description' => 'nullable|max:2000',
            'band.logo' => 'nullable',
            'logo' => 'required|max:2048',
            'videos.*' => 'nullable'
        ];
    }

    /**
     * Validation messages.
     * 
     * @return array
     */
    protected function messages ()
    {
        return [
            'band.name.required' => 'Voer een band naam in.',
            'band.biography.max' => 'De biografie van de band mag niet meer dan 500 letters bevatten.',
            'band.description.max' => 'De beschrijving van de band mag niet meer dan 2000 letters bevatten.',
            'logo.required' => 'Een logo is verplicht.',
            'logo.image' => 'Een logo moet een plaatje zijn.',
            'logo.max' => 'Het bestand is te groot, maximaal 2MB.'
        ];
    }

    /**
     * Set band equal to empty array or band.
     * 
     * @param $band
     * @return void
     */
    public function mount ($band = null)
    {
        $band
            ? $this->band = $band
            : $this->band = $this->makeNewBand();
        
        $this->band->logo
            ? $this->logo = $this->band->logo
            : null;

        $this->videos = $this->band->videos->pluck('url');
    }

    /**
     * Forget video when value is null, check everytime when videos are updated.
     * 
     * @return void
     */
    public function updatedVideos ()
    {
        foreach ($this->videos as $key => $video) {
            
            if ($video == null) {
                
                $this->videos->forget($key);
            }
            
        }
    }
    
    /**
     * Save the current band record.
     * 
     * @return Illuminate\Http\Response
     */
    public function save (Request $request)
    {
        // Validate input data.
        $this->validate();

        // Save band.
        $this->band->save();

        // For every video, make a new video.
        foreach ($this->videos as $video) {
        
            if (!Video::find($video)) {

                Video::create([
                    'id' => $video,
                    'url' => $video
                ]);
            }
            
        }
        
        // Sync attached videos.
        $this->band->videos()->sync($this->videos);

        // Save image if it does not exist.
        if (!Storage::disk('photos')->exists($this->logo)) {
            
            // Delete old logo.
            Storage::disk('photos')->delete($this->band->logo);

            /** 
             * Store logo in photos directory, and set column logo from band
             * to the name of the uploaded logo.
             */
            $this->band->logo = $this->logo->hashName();
            $this->logo->store('public/photos');
        }

        // Save the band.
        $this->band->save();

        // Return to the main bands list.
        return redirect()->route('bands')
            ->with($request->session()->flash('message', 'Band ' . $this->band->name . ' opgeslagen!'));
    }

    /**
     * Make new band.
     * 
     * @return Collection
     */
    private function makeNewBand ()
    {
        return Band::make([
            'name' => null,
            'description' => null,
            'biography' => null,
            'logo' => null
        ]);
    }

    /**
     * Render the Livewire component.
     * 
     * @return Livewire\Component
     */
    public function render()
    {
        return view('livewire.bands.band-form');
    }
}
