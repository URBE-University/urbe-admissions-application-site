<div>
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-3">
            <div class="flex items-center justify-between">
                <h2 class="text-3xl font-bold text-slate-800">{{__("Pay & submit application")}}</h2>
                <img src="{{ asset('urbe-logo.svg') }}" alt="URBE University logo" class="w-32">
            </div>
            <div class="my-6 w-full border-t border-slate-200"></div>
        </div>

        <div class="col-span-3 mx-auto text-center">
            <img src="{{asset('undraw_happy_news_re_tsbd.svg')}}" alt="{{__("One more step image")}}" class="mx-auto">
            <h1 class="mt-4 text-4xl font-black tracking-wide">
                {{__("You made it!")}}
            </h1>
            <p class="mt-4 text-2xl font-semibold">
                {{__("Your application is now ready to be submitted.")}}
            </p>

            <p class="mt-6 text-lg font-base">
                {!! __("In the next step, we will process your <b>non-refundable</b> application payment. If you do not have a card with you at the moment, you can skip this step by clicking the 'Skip Payment' button to submit your application without payment.") !!}
            </p>

            <div class="mt-6 bg-red-100 rounded-lg border border-red-300 text-red-700 p-2">
                {{__("Please notice that if you skip the payment now, you are still responsible for the application fee. One of our representatives will contact you to collect the application fee before your application is accepted by the University.")}}
            </div>
        </div>

        <div class="mt-6 col-span-3 flex items-center justify-end gap-4">
            @livewire('application.save', ['application' => $application->id])

            <x-jet-secondary-button type="submit" wire:click="save">
                {{__("Skip Payment")}}
            </x-jet-secondary-button>

            <x-jet-button type="submit" wire:click="pay">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                    <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                </svg>
                <span class="ml-2">
                    {{__("Pay and Submit")}}
                </span>
            </x-jet-button>
        </div>
    </div>
</div>
