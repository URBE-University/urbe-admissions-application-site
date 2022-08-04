<?php

namespace App\Http\Livewire\Application\Edit;

use Livewire\Component;
use App\Models\Application;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UploadDocuments extends Component
{
    use WithFileUploads;

    public $editModal, $application, $uuid;
    public $official_transcripts, $official_transcripts_url;
    public $hs_bs_diploma, $hs_bs_diploma_url;
    public $id_file, $id_url;

    public function mount()
    {
        if (! isset($this->uuid)) {
            return redirect()->to('/');
        }
        $this->application = Application::where('uuid', $this->uuid)->first();
    }

    public function update()
    {
        $this->validate([
            'official_transcripts' => 'max:4096',
            'hs_bs_diploma' => 'max:4096',
            'id_file' => 'max:4096',
        ]);

        if ($this->official_transcripts) {
            Storage::delete(['transcripts/'.$this->application->official_transcripts_url]);
            $this->official_transcripts->storeAs('transcripts', $this->official_transcripts->getClientOriginalName());
        }

        if ($this->hs_bs_diploma) {
            Storage::delete(['diplomas/'.$this->application->hs_bs_diploma_url]);
            $this->hs_bs_diploma->storeAs('diplomas', $this->hs_bs_diploma->getClientOriginalName());
        }

        if ($this->id_file) {
            Storage::delete(['ids/'.$this->application->id_url]);
            $this->id_file->storeAs('ids', $this->id_file->getClientOriginalName());
        }

        try {
            $this->application->update([
                'official_transcripts_url' => ($this->official_transcripts) ? $this->official_transcripts->getClientOriginalName() : $this->application->official_transcripts_url,
                'hs_bs_diploma_url' => ($this->hs_bs_diploma) ? $this->hs_bs_diploma->getClientOriginalName() : $this->application->hs_bs_diploma_url,
                'id_url' => ($this->id_file) ? $this->id_file->getClientOriginalName() : $this->application->id_url,
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
        }

        return redirect()->to('/start?application_id=' . $this->uuid);
    }
    public function render()
    {
        return view('livewire.application.edit.upload-documents');
    }
}
