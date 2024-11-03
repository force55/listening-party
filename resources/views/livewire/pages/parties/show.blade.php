<?php

    use App\Models\ListeningParty;
    use Livewire\Volt\Component;

    new class extends Component {
        public listeningParty $listeningParty;

        public function mount(ListeningParty $listeningParty)
        {
            $this->listeningParty = $listeningParty;
        }

    }; ?>

<div>
    {{ $this->listeningParty->name }}
</div>
