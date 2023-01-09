<?php

namespace App\Http\Livewire\Application\Edit;

use Livewire\Component;
use App\Models\Application;
use Illuminate\Support\Facades\Log;
use Livewire\WithFileUploads;

class WorkHistory extends Component
{
    use WithFileUploads;
    public $editModal, $uuid, $application, $employed_q, $employer_name, $job_title, $resume, $resume_url;

    public function mount()
    {
        $this->application = Application::where('uuid', $this->uuid)->first();
        $this->employed_q = ($this->application->employer_name) ? 'yes' : 'no';
        $this->employer_name = $this->application->employer_name;
        $this->job_title = $this->application->job_title;
        $this->resume = $this->application->resume;
    }

    public function update()
    {
        $this->validate([
            'resume' => 'required|file|max:4096' // 4MB max
        ]);

        $this->resume->storeAs('resumes', $this->resume->getClientOriginalName());

        try {

            $this->application->update([
                'employer_name' => $this->employer_name,
                'job_title' => $this->job_title,
                'resume_url' => ($this->resume) ? $this->resume->getClientOriginalName() : null,
            ]);

        } catch (\Throwable $th) {
            Log::error($th);
        }
        return redirect()->to( '/' . app()->getLocale() . '/start?application_id=' . $this->uuid);
    }

    public function render()
    {
        return view('livewire.application.edit.work-history');
    }
}
