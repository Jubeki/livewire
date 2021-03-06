<div>
    <dl>
        <dt>Component ID</dt>
        <dd>{{ $id }}</dd>

        @foreach (Tests\Browser\SyncHistory\Step::all() as $each_step)
            <dt>{{ $each_step->title }}</dt>
            <dd>
                @if($each_step->is($step))
                    <button
                        disabled
                        dusk="step-{{ $each_step->id }}"
                        wire:click="setStep({{ $each_step->id }})"
                    >
                        Step {{ $each_step->title }} Active
                    </button>
                @else
                    <button
                        dusk="step-{{ $each_step->id }}"
                        wire:click="setStep({{ $each_step->id }})"
                    >
                        Activate {{ $each_step->title }}
                    </button>
                @endif
            </dd>
        @endforeach

        <dt>Help</dt>
        <dd>
            Help is currently {{ $showHelp ? 'enabled' : 'disabled' }}.
            <button dusk="toggle-help" wire:click="toggleHelp">Toggle</button>
        </dd>

        @livewire(\Tests\Browser\SyncHistory\ChildComponent::class)
    </dl>
</div>
