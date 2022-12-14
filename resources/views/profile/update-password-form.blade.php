<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_password" value="{{ __('Current Password') }}" />
            <x-jet-input id="current_password" type="password" class="mt-1 block w-full"
                wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <div class="flex justify-between">
                <x-jet-label for="password" value="{{ __('New Password') }}" />
                <x-jet-label id="show-password" data-show="show" class="text-blue-500 cursor-pointer">Show</x-jet-label>
            </div>
            <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password"
                autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <div class="flex justify-between">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-label id="show-password_confirmation" data-show="show" class="text-blue-500 cursor-pointer">Show
                </x-jet-label>
            </div>
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full"
                wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
        <script>
            $('#show-password').click(function() {
                if ($(this).data('show') == 'show') {
                    $(this).text('Hide');
                    $(this).data('show', 'hide');
                    $('#password').attr('type', 'text');
                } else {
                    $(this).text('Show');
                    $(this).data('show', 'show');
                    $('#password').attr('type', 'password');
                }
            })
            $('#show-password_confirmation').click(function() {
                if ($(this).data('show') == 'show') {
                    $(this).text('Hide');
                    $(this).data('show', 'hide');
                    $('#password_confirmation').attr('type', 'text');
                } else {
                    $(this).text('Show');
                    $(this).data('show', 'show');
                    $('#password_confirmation').attr('type', 'password');
                }
            })
        </script>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>

</x-jet-form-section>
