<div>
    {{-- Form --}}
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-3 text-center">
            <img src="https://urbe.university/wp-content/uploads/2019/01/urbe-white-logo.jpg" alt="" class="h-44 mx-auto">
            <div class="mt-2 text-center">{!!__("11430 NW 20<sup>th</sup> St. Suite 150 Sweetwater, Florida. 33172")!!}</div>
            <div class="mt-2 font-bold tracking-wide uppercase">{{__("Application for admission")}}</div>
        </div>

        <div class="col-span-3 w-full bg-blue-900 text-white uppercase text-center font-bold py-2">
            {{__("Applicant Information")}}
        </div>

        <div class="col-span-1 border border-slate-600">
            <div class="p-2 flex items-center">
                <span class="font-semibold">{{__("First Name:")}}</span>
                <span class="ml-4">{{ $application->first_name }}</span>
            </div>
        </div>
        <div class="col-span-1 border border-slate-600">
            <div class="p-2 flex items-center">
                <span class="font-semibold">{{__("Middle Name:")}}</span>
                <span class="ml-4">{{ $application->middle_name }}</span>
            </div>
        </div>
        <div class="col-span-1 border border-slate-600">
            <div class="p-2 flex items-center">
                <span class="font-semibold">{{__("Last Name:")}}</span>
                <span class="ml-4">{{ $application->last_name }}</span>
            </div>
        </div>

        <div class="col-span-1 border border-slate-600">
            <div class="p-2 flex items-center">
                <span class="font-semibold">{{__("Address:")}}</span>
                <span class="ml-4">{{ $application->street }}</span>
            </div>
        </div>
        <div class="col-span-1 border border-slate-600">
            <div class="p-2 flex items-center">
                <span class="font-semibold">{{__("City:")}}</span>
                <span class="ml-4">{{ $application->city }}</span>
            </div>
        </div>
        <div class="col-span-1">
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-1 p-2 flex items-center border border-slate-600">
                    <span class="font-semibold">{{__("State:")}}</span>
                    <span class="ml-4">{{ $application->state }}</span>
                </div>
                <div class="col-span-1 p-2 flex items-center border border-slate-600">
                    <span class="font-semibold">{{__("Zip Code:")}}</span>
                    <span class="ml-4">{{ $application->zip }}</span>
                </div>
            </div>
        </div>

        <div class="col-span-1 border border-slate-600">
            <div class="p-2 flex items-center">
                <span class="font-semibold">{{__("Phone:")}}</span>
                <span class="ml-4">{{ $application->phone_code . $application->phone }}</span>
            </div>
        </div>
        <div class="col-span-1 border border-slate-600">
            <div class="p-2 flex items-center">
                <span class="font-semibold">{{__("E-mail:")}}</span>
                <span class="ml-4">{{ $application->email }}</span>
            </div>
        </div>
        <div class="col-span-1 border border-slate-600">
            <div class="p-2 flex items-center">
                <span class="font-semibold">{{__("Gender:")}}</span>
                <span class="ml-4">{{ $application->gender }}</span>
            </div>
        </div>
        <div class="col-span-3 border border-slate-600">
            <div class="p-2 flex items-center">
                <span class="font-semibold">{{__("Marital Status:")}}</span>
                <span class="ml-4">{{ $application->marital_status }}</span>
            </div>
        </div>
        <div class="col-span-1 border border-slate-600">
            <div class="p-2 flex items-center">
                <span class="font-semibold">{{__("Date of Birth:")}}</span>
                <span class="ml-4">{{ date('m/d/Y', strtotime($application->dob)) }}</span>
            </div>
        </div>
        <div class="col-span-1 border border-slate-600">
            <div class="p-2 flex items-center">
                <span class="font-semibold">{{__("Social Security:")}}</span>
                <span class="ml-4">{{__("Encrypted")}}</span>
            </div>
        </div>
        <div class="col-span-1 border border-slate-600">
            <div class="p-2 flex items-center">
                <span class="font-semibold">{{__("ID:")}}</span>
                <span class="ml-4">{{__("Attached to application")}}</span>
            </div>
        </div>

        <div class="col-span-3 border border-slate-600">
            <div class="p-2 flex items-center">
                <span class="font-semibold">{{__("Are you a veteran?")}}</span>
                <span class="ml-4">{{ ($application->military === 1) ? 'Yes' : 'No' }}</span>
            </div>
        </div>

        <div class="col-span-3 border border-slate-600">
            <div class="p-2 flex items-center">
                <span class="font-semibold">{{__("Ethnicity:")}}</span>
                <span class="ml-4">{{ $application->ethnicity }}</span>
            </div>
        </div>

        <div class="col-span-3 w-full bg-blue-900 text-white uppercase text-center font-bold py-2">
            {{__("Academic Program")}}
        </div>

        <div class="col-span-3 border border-slate-600">
            <div class="p-2 flex items-center">
                <span class="font-semibold">{{__("Program:")}}</span>
                <span class="ml-4">{{ $application->program }}</span>
            </div>
        </div>
        <div class="col-span-3 border border-slate-600">
            <div class="p-2 flex items-center">
                <span class="font-semibold">{{__("Concentration:")}}</span>
                <span class="ml-4">{{ $application->concentration }}</span>
            </div>
        </div>
        <div class="col-span-3 border border-slate-600">
            <div class="p-2 flex items-center">
                <span class="font-semibold">{{__("Format:")}}</span>
                <span class="ml-4">{{ $application->program_format }}</span>
            </div>
        </div>
        <div class="col-span-3 border border-slate-600">
            <div class="p-2 flex items-center">
                <span class="font-semibold">{{__("Language:")}}</span>
                <span class="ml-4">{{ ucfirst($application->program_language) }}</span>
            </div>
        </div>

        <div class="col-span-3 w-full bg-blue-900 text-white uppercase text-center font-bold py-2">
            {{__("Sign document")}}
        </div>

        {{-- Signature --}}
        <div class="col-span-2">
            <div class="p-2 flex items-center border-b border-slate-600">
                <span class="font-semibold">{{__("Applicant Signature:")}}</span>
                <span class="ml-4 border-b border-slate-600"></span>
            </div>
        </div>

        <div class="col-span-1">
            <div class="p-2 flex items-center border-b border-slate-600">
                <span class="font-semibold">{{__("Date:")}}</span>
                <span class="ml-4"></span>
            </div>
        </div>


        <div class="col-span-3">
            <div class="p-2 flex items-center border-b border-slate-600">
                <span class="font-semibold">{{__("Legal Guardian Name (if applicant under 18):")}}</span>
                <span class="ml-4"></span>
            </div>
        </div>
        <div class="col-span-2">
            <div class="p-2 flex items-center border-b border-slate-600">
                <span class="font-semibold">{{__("Legal Guardian Signature:")}}</span>
                <span class="ml-4"></span>
            </div>
        </div>
        <div class="col-span-1">
            <div class="p-2 flex items-center border-b border-slate-600">
                <span class="font-semibold">{{__("Date:")}}</span>
                <span class="ml-4"></span>
            </div>
        </div>

        <div class="col-span-3 w-full bg-blue-900 text-white uppercase text-center font-bold py-2">
            {{__("Academic Review Commitee Comments")}}
        </div>
        <div class="col-span-3">
            <div class="p-2 flex items-center border border-slate-600 h-48"></div>
        </div>
        <div class="col-span-3 grid grid-cols-2 gap-4">
            <div class="col-span-1">
                <div class="p-2 flex items-center border-b border-slate-600">
                    <span class="font-semibold">{{__("Dean:")}}</span>
                    <span class="ml-4"></span>
                </div>
            </div>
            <div class="col-span-1">
                <div class="p-2 flex items-center border-b border-slate-600">
                    <span class="font-semibold">{{__("Academic Advisor:")}}</span>
                    <span class="ml-4"></span>
                </div>
            </div>
        </div>
    </div>
    {{-- Form end --}}

    <div class="mt-24"></div>

    <div class="grid grid-cols-3 gap-4 bg-red-200 p-8 rounded-md">
        @if (!$application->applicant_verification_code)
            <div class="col-span-1 col-start-2">
                <div class="w-full text-justify mt-1 text-base border-l-2 border-red-600 pl-2 text-red-600">
                    <label for="acknowledgement">
                        <input type="checkbox" id="acknowledgement" wire:model="acknowledgement">
                        <span>{{__("I hereby acknowledge that I have read and understand the application above.")}}</span>
                    </label>
                </div>

                <div class="mt-8">
                    <x-jet-label for="name" value="{{__('Please enter your full name *')}}" />
                    <x-jet-input type="text" id="name" wire:model="name" class="w-full mt-1"/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{__('Please enter your email *')}}" />
                    <x-jet-input type="email" id="email" wire:model="email" class="w-full mt-1"/>
                </div>

                <div class="mt-4">
                    <x-jet-button type="submit" wire:click="sendCode">
                        {{__("Send verification code")}}
                    </x-jet-button>
                </div>
            </div>

            {{-- Disclaimer --}}
            <div class="mt-6 col-span-3">
                <p class="w-full text-justify mt-1 text-base text-slate-600">{{__("I acknowledge that I have read and understood the content of this document. I acknowledge that I electronically sign this document by clicking on the Sign button. I give my consent to the use of electronic communications and records related to this document.")}}</p>
            </div>
        @elseif ($application->applicant_verification_code && $application->applicant_acknowledgement && $application->applicant_verification_ip && $application->applicant_email)
            <div class="col-span-1 col-start-2">
                <div class="mt-4">
                    <x-jet-label for="code" value="{{__('Enter the verification code we emailed you')}}" />
                    <x-jet-input type="text" id="code" wire:model="code" class="w-full mt-1"/>
                    <x-jet-input-error for="code"/>
                </div>

                <div class="mt-4">
                    <x-jet-danger-button type="submit" wire:click="sign">
                        {{__("Sign Application")}}
                    </x-jet-danger-button>
                </div>
            </div>
        @endif
    </div>
</div>
