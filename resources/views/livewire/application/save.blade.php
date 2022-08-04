<div>
    <x-jet-secondary-button wire:click="$toggle('saveApplicationModal')">
        {{__("Continue later")}}
    </x-jet-secondary-button>

    <x-jet-dialog-modal wire:model="saveApplicationModal">
        <x-slot name="title">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <p class="ml-2">{{__("Save application")}}</p>
            </div>
        </x-slot>
        <x-slot name="content">
            <p>{!!__("We will send you an email to <span class='underline text-blue-600'>" . $application_email . "</span> with a link, that you can use to continue your application.")!!}</p>
            <p class="mt-1 text-red-600">{{__("Please notice that only progress made until this point will be saved. When you come back, you will need to complete this page again.")}}</p>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('saveApplicationModal')">
                {{__("Nevermind")}}
            </x-jet-secondary-button>
            <x-jet-button class="ml-2" wire:click="save">
                {{__("Save application")}}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
