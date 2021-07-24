<x-modal formAction="update">
    <x-slot name="title">
        Clock
    </x-slot>

    <x-slot name="content">
        Hi! 👋 {{ $counter }}
    </x-slot>

    <x-slot name="buttons">
        <button type="submit" class="btn btn-primary btn-md">Start counting</button>
        <button wire:click="$emit('closeModal')" class="btn btn-danger btn-md">Close Modal</button>
    </x-slot>
</x-modal>