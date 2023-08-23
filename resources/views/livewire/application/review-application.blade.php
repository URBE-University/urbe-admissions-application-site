<div>
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-3">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-bold text-slate-800">{{__("Review application")}}</h2>
                    <p class="mt-1 text-sm">{{__("You are almost done! Please now review your application, and make sure that all the information here is accurate.")}}</p>
                </div>
                <img src="{{ asset('urbe-logo.svg') }}" alt="URBE University logo" class="w-32">
            </div>
            <div class="mt-2 mb-6 w-full border-t border-slate-200"></div>
        </div>

        <div class="col-span-3">
            <div class="flex items-center justify-between">
                <p class="font-base">{{__("Contact details")}}</p>
                @livewire('application.edit.contact-details', ['uuid' => $application->uuid])
            </div>
            <div class="mt-2 bg-white rounded-lg shadow">
                <div class="rounded-t rounded-lg grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("First Name")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{$application->first_name}}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Middle Name")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{$application->middle_name ?? '-'}}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Last Name")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{$application->last_name ?? '-'}}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Previous First Name")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{$application->prev_first_name ?? '-'}}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Previous Middle Name")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{$application->prev_middle_name ?? '-'}}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Previous Last Name")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{$application->prev_last_name ?? '-'}}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Email address")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{$application->email}}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Phone number")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">+{{$application->phone_code . ' ' . $application->phone}}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Street address")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">
                        {{$application->street}}
                    </div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Street address line 2")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">
                        {{$application->street_ext ?? '-'}}
                    </div>
                </div>

                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("City")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">
                        {{$application->city}}
                    </div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("State/Province")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">
                        {{$application->state}}
                    </div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Zip code")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">
                        {{$application->zip}}
                    </div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="rounded-b rounded-lg grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Country")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">
                        {{$application->country}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Personal Information --}}
        <div class="mt-6 col-span-3">
            <div class="flex items-center justify-between">
                <p class="font-base">{{__("Personal Information")}}</p>
                @livewire('application.edit.personal-information', ['uuid' => $application->uuid])
            </div>
            <div class="mt-2 bg-white rounded-lg shadow">
                <div class="rounded-t rounded-lg grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Date of birth")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{date('F d, Y', strtotime($application->dob))}}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("SSN (last four digits)")}}</div>
                    @if ($application->ssn)
                        <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">******{{ Str::substr(Crypt::decryptString($application->ssn), -4) }}</div>
                    @endif
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Drivers License/Passport (last 4)")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">******{{ Str::substr(Crypt::decryptString($application->dl_passport), -4) }}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("US Resident")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">@if ($application->us_resident === 1) {{__("Yes")}} @else {{__("No")}} @endif</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Active or retired from the military?")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">@if ($application->military === 1) {{__("Yes")}} @else {{__("No")}} @endif</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="rounded-b rounded-lg grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Civilian working in the military?")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">@if ($application->military_civilian === 1) {{__("Yes")}} @else {{__("No")}} @endif</div>
                </div>
            </div>
        </div>

        {{-- Program details --}}
        <div class="mt-6 col-span-3">
            <div class="flex items-center justify-between">
                <p class="font-base">{{__("Program details")}}</p>
                @livewire('application.edit.program-of-interest', ['uuid' => $application->uuid])
            </div>
            <div class="mt-2 bg-white rounded-lg shadow">
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Applying for")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{$application->degree}}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Academic program")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{$application->program}}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Concentration")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{$application->concentration ?? '-'}}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Program format")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900 capitalize">{{$application->program_format ?? '-'}}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="rounded-b rounded-lg grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Tentative start date")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900 capitalize">{{date('F d, Y', strtotime($application->start_date)) ?? '-'}}</div>
                </div>
            </div>
        </div>

        {{-- Education information --}}
        <div class="mt-6 col-span-3">
            <div class="flex items-center justify-between">
                <p class="font-base">{{__("Education details")}}</p>
                @livewire('application.edit.education-background', ['uuid' => $application->uuid])
            </div>
            <div class="mt-2 bg-white rounded-lg shadow">
                <div class="rounded-t rounded-lg grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Education level")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{$application->education_level}}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="rounded-t rounded-lg grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Highschool name")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{$application->hs_name}}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Highschool city")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{$application->hs_city}}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Highschool country")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{$application->hs_country}}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Highschool completed on")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{ date('F d, Y', strtotime($application->hs_completion_date)) }}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Post-secondary school name")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{ $application->ps_school_name ?? '-' }}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Post-secondary school city")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{ $application->ps_school_city ?? '-' }}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Post-secondary school country")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{ $application->ps_school_country ?? '-' }}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="rounded-b rounded-lg grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Degree earned")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900 capitalize">{{$application->degree_earned ?? '-'}}</div>
                </div>
            </div>
        </div>

        {{-- Work details --}}
        <div class="mt-6 col-span-3">
            <div class="flex items-center justify-between">
                <p class="font-base">{{__("Employment information")}}</p>
                @livewire('application.edit.work-history', ['uuid' => $application->uuid])
            </div>
            <div class="mt-2 bg-white rounded-lg shadow">
                <div class="rounded-t rounded-lg grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Employer name")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900">{{$application->employer_name ?? __('currently unemployed')}}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="rounded-t rounded-lg grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Job title")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900 capitalize">{{$application->job_title ?? '-'}}</div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="rounded-b rounded-lg grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Resume")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900 py-3 px-4 border rounded-lg">
                        @if ($application->resume_url)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 text-sm">{{$application->resume_url}}</span>
                                </div>
                                <button class="text-sm font-medium text-blue-600" wire:click="downloadResume">{{__("Download")}}</button>
                            </div>
                        @else
                            {{__("missing or not applicable")}}
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Required documents --}}
        <div class="mt-6 col-span-3">
            <div class="flex items-center justify-between">
                <p class="font-base">{{__("Required documents")}}</p>
                @livewire('application.edit.upload-documents', ['uuid' => $application->uuid])
            </div>
            <div class="mt-2 bg-white rounded-lg shadow">
                <div class="rounded-t rounded-lg grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Official transcripts")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900 py-3 px-4 border rounded-lg">
                        @if ($application->official_transcripts_url)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 text-sm">{{$application->official_transcripts_url}}</span>
                                </div>
                                <button class="text-sm font-medium text-blue-600" wire:click="downloadTranscript">{{__("Download")}}</button>
                            </div>
                        @else
                            {{__("missing or not applicable")}}
                        @endif
                    </div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Highschool diploma / Post-secondary diploma")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900 py-3 px-4 border rounded-lg">
                        @if ($application->hs_bs_diploma_url)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 text-sm">{{$application->hs_bs_diploma_url}}</span>
                                </div>
                                <button class="text-sm font-medium text-blue-600" wire:click="downloadDiploma">{{__("Download")}}</button>
                            </div>
                        @else
                            {{__("missing or not applicable")}}
                        @endif
                    </div>
                </div>
                <div class="border-t border-slate-200"></div>
                <div class="rounded-b rounded-lg grid grid-cols-3 gap-1 sm:gap-4 p-4">
                    <div class="col-span-3 sm:col-span-1 text-sm font-medium text-gray-500">{{__("Driver's license / Passport")}}</div>
                    <div class="col-span-3 sm:col-span-2 text-sm text-gray-900 py-3 px-4 border rounded-lg">
                        @if ($application->id_url)
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 text-sm">{{$application->id_url}}</span>
                                </div>
                                <button class="text-sm font-medium text-blue-600" wire:click="downloadId">{{__("Download")}}</button>
                            </div>
                        @else
                             {{__("missing or not applicable")}}
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 col-span-3 flex items-center justify-end gap-4">
            @livewire('application.save', ['application' => $application->id])
            <x-jet-danger-button type="submit" wire:click="save">
                {{__("Sign application")}}
            </x-jet-danger-button>
        </div>
    </div>
</div>
