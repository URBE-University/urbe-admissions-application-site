<div>
    <x-slot name="header">
        <p class="text-xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Academic Degrees --}}
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1 flex justify-between">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">
                            {{-- Title --}}
                            Degrees
                        </h3>
                        <p class="mt-1 text-sm text-gray-600">
                            {{-- Subtitle --}}
                            The degrees in this list will be displayed as options in the application form.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form wire:submit.prevent="addDegree">
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <x-jet-label for="degree" value="Add degree"/>
                            <x-jet-input type="text" wire:model="degree" class="w-full mt-1" placeholder="Undergraduate" />
                            <ul class="mt-4 inline-block">
                                @forelse ($degrees as $degree)
                                    <li class="mt-1 py-1 px-2 border rounded-lg flex items-center space-x-3">
                                        <span>{{ $degree->name }}</span>
                                        @livewire('settings.edit-degree', ['degree' => $degree], key('editDegree-' . $degree->id))
                                        <button wire:click="delDegree({{$degree->id}})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-300 hover:text-red-600 transition-all" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            <x-jet-button type="submit">Add Degree</x-jet-button>
                        </div>
                    </form>
                </div>
            </div>

            @if ($degrees->count() > 0)
            <div class="py-8">
                <div class="border-t border-gray-200"></div>
            </div>

            {{-- Academic Programs --}}
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1 flex justify-between">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">
                            {{-- Title --}}
                            Academic programs
                        </h3>
                        <p class="mt-1 text-sm text-gray-600">
                            {{-- Subtitle --}}
                            The programs in this list will be displayed as options in the application form.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form wire:submit.prevent="addProgram">
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <x-jet-label for="degree" value="Select degree"/>
                            <select id="degree" wire:model="degree" class="mt-1">
                                <option> - </option>
                                @forelse ($degrees as $degree)
                                    <option value="{{$degree->id}}">{{$degree->name}}</option>
                                @empty
                                @endforelse
                            </select>
                            <div class="mt-6"></div>
                            <x-jet-label for="program" value="Add program"/>
                            <x-jet-input type="text" wire:model="program" class="w-full mt-1" placeholder="Master in Business Administration" />

                            <ul class="mt-4 inline-block">
                                @forelse ($programs as $program)
                                    <li class="mt-1 py-1 px-2 border rounded-lg flex items-center space-x-3">

                                        <span>
                                            <span class="text-blue-500">{{ $program->degree->name }}</span>
                                            {{ $program->name }}
                                        </span>
                                        @livewire('settings.edit-program', ['program' => $program], key('editProgram-' . $program->id))
                                        <button wire:click="delProgram({{$program->id}})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-300 hover:text-red-600 transition-all" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            <x-jet-button type="submit">Add Program</x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
            @endif

            @if ($programs->count() > 0)
            <div class="py-8">
                <div class="border-t border-gray-200"></div>
            </div>

            {{-- Academic Concentration --}}
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1 flex justify-between">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">
                            {{-- Title --}}
                            Concentrations
                        </h3>
                        <p class="mt-1 text-sm text-gray-600">
                            {{-- Subtitle --}}
                            The concentrations in this list will be displayed as options in the application form.
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form wire:submit.prevent="addConcentration">
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <x-jet-label for="program" value="Select program"/>
                            <select id="program" wire:model="program" class="mt-1">
                                <option> - </option>
                                @forelse ($programs as $program)
                                    <option value="{{$program->id}}">{{$program->name}}</option>
                                @empty
                                @endforelse
                            </select>
                            <div class="mt-6"></div>
                            <x-jet-label for="concentration" value="Add concentration"/>
                            <x-jet-input type="text" wire:model="concentration" class="w-full mt-1" placeholder="Finance" />

                            <ul class="mt-4 inline-block">
                                @forelse ($concentrations as $concentration)
                                    <li class="mt-1 py-1 px-2 border rounded-lg flex items-center space-x-3">
                                        <span>
                                            <span class="text-green-500">{{ $concentration->program->name }}</span>
                                            {{ $concentration->name }}
                                        </span>
                                        @livewire('settings.edit-concentration', ['concentration' => $concentration], key('editConcentration-' . $concentration->id))
                                        <button wire:click="delConcentration({{$concentration->id}})">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-red-600">
                                                <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            <x-jet-button type="submit">Add Concentration</x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
