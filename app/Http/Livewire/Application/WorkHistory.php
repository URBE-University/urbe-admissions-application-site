<?php

namespace App\Http\Livewire\Application;

use Livewire\Component;
use App\Models\Application;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WorkHistory extends Component
{
    use WithFileUploads;

    public $application, $uuid;
    public $employed_q = "no";
    public $employer_name, $job_title, $resume, $resume_url;

    public function mount()
    {
        if (! isset($this->uuid)) {
            return redirect()->to('/');
        }
        $this->application = Application::where('uuid', $this->uuid)->first();
    }

    public function save()
    {
        if ($this->resume) {
            $this->validate([
                'resume' => 'file|max:4096' // 4MB max
            ]);

            try {
                $this->resume->storeAs('resumes', $this->resume->getClientOriginalName());
                $this->application->update([
                    'step' => 6,
                    'employer_name' => $this->employer_name,
                    'job_title' => $this->job_title,
                    'resume_url' => ($this->resume) ? $this->resume->getClientOriginalName() : null,
                ]);
                DB::table('application_log')->insert([
                    'application_id' => $this->application->id,
                    'description' => 'Work history completed.'
                ]);
            } catch (\Throwable $th) {
                Log::error($th);
            }
        } else {
            $this->application->update([
                'step' => 6,
            ]);
        }
        return redirect()->to( '/' . app()->getLocale() . '/start?application_id=' . $this->uuid);
    }

    public function render()
    {
        return view('livewire.application.work-history');
    }
}
