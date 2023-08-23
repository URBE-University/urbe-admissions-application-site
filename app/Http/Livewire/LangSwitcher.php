<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LangSwitcher extends Component
{
    public $locale;

    public function mount()
    {
        $this->locale = app()->getLocale();
    }

    public function setLocale()
    {
        app()->setLocale($this->locale);
        return redirect()->route('home', ['language' => app()->getLocale()]);
    }

    public function render()
    {
        return view('livewire.lang-switcher');
    }
}
