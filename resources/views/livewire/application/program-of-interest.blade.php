<div>
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-3">
            <div class="flex items-center justify-between">
                <h2 class="text-3xl font-bold text-slate-800">{{__("Select your program of interest")}}</h2>
                <img src="{{ asset('urbe-logo.svg') }}" alt="URBE University logo" class="w-32">
            </div>
            <div class="my-6 w-full border-t border-slate-200"></div>
        </div>

        <div class="col-span-3">
            <label for="degree" class="block text-sm font-semibold text-slate-800">{{__("What degree level are you seeking?")}} <span class="text-red-600 font-bold">*</span></label>
            <select name="degree" id="degree" wire:model="degree" class="mt-1 w-full">
                <option value="null">{{__("Select")}}</option>
                @forelse ($degrees as $degree)
                    <option value="{{$degree->name}}">{{$degree->name}}</option>
                @empty

                @endforelse
            </select>
            @error('degree')
                <span class="text-sm text-red-600">{{$message}}</span>
            @enderror
        </div>

        @if ($programs)
            <div class="mt-6 col-span-3">
                <label for="program" class="block text-sm font-semibold text-slate-800">{{__("What program are you seeking?")}} <span class="text-red-600 font-bold">*</span></label>
                <select name="program" id="program" wire:model="program" class="mt-1 w-full">
                    <option value="null">{{__("Select")}}</option>
                    @forelse ($programs as $program)
                        <option value="{{$program->name}}">{{$program->name}}</option>
                    @empty

                    @endforelse
                </select>
                @error('program')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </div>
        @endif

        @if ($concentrations)
            <div class="mt-6 col-span-3">
                <label for="concentration" class="block text-sm font-semibold text-slate-800">{{__("What concentration interests you?")}}</label>
                <select name="concentration" id="concentration" wire:model="concentration" class="mt-1 w-full">
                    <option value="null">{{__("Select")}}</option>
                    @forelse ($concentrations as $concentration)
                        <option value="{{$concentration->name}}">{{$concentration->name}}</option>
                    @empty

                    @endforelse
                </select>
            </div>
        @endif

        <div class="mt-6 col-span-3">
            <label for="start_date" class="block text-sm font-semibold text-slate-800">{{__("When would you like to start classes?")}} <span class="text-red-600 font-bold">*</span></label>
            <input type="date" name="start_date" id="start_date" wire:model="start_date" class="mt-1 w-full" min="{{Carbon\Carbon::now()->format('Y-m-d')}}">
            <p class="w-full text-justify mt-1 text-sm text-slate-600">{{__("An admissions representative will work with you to determine your actual start date.")}}</p>
            @error('start_date')
                <span class="text-sm text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="mt-6 col-span-3">
            <label for="program_format" class="block text-sm font-semibold text-slate-800">{{__("Are you applying for an online or on-campus program?")}}</label>
            <select name="program_format" id="program_format" wire:model="program_format" class="mt-1 w-full">
                <option value="null">{{__("Select")}}</option>
                <option value="on_campus">{{__("On-campus")}}</option>
                <option value="online">{{__("Online")}}</option>
            </select>
            @error('program_format')
                <span class="text-sm text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="mt-6 col-span-3">
            <label for="program_language" class="block text-sm font-semibold text-slate-800">{{__("Please pick the language you would like to complete your program on?")}}</label>
            <select name="program_language" id="program_language" wire:model="program_language" class="mt-1 w-full">
                <option value="null">{{__("Select")}}</option>
                <option value="english">{{__("English")}}</option>
                <option value="spanish">{{__("Spanish")}}</option>
            </select>
            @error('program_language')
                <span class="text-sm text-red-600">{{$message}}</span>
            @enderror
        </div>

        <div class="mt-6 col-span-3 flex items-center justify-end gap-4">
            @livewire('application.save', ['application' => $application->id])

            <x-jet-button type="submit" wire:click="save">
                {{__("Continue")}}
            </x-jet-button>
        </div>
    </div>
</div>
