<?php

namespace Bites\Core\Field;

use Bites\Core\Models\Csa\Snapshot;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CameraCaptureModal extends Component
{
    public $imagePath;

    protected $listeners = [
        'close-modal' => 'closeModal',
    ];

    public function capture($dataUrl)
    {
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $dataUrl));

        $path = 'snapshots/'.uniqid('snap_').'.png';
        Storage::disk('public')->put($path, $imageData);

        $snapshot = Snapshot::create(['path' => $path]);

        $this->imagePath = $snapshot->path;

        // Emit browser event to close filament modal
        $this->dispatchBrowserEvent('close-modal', ['id' => 'cameraCaptureModal']);
        $this->dispatchBrowserEvent('filament-notify', ['type' => 'success', 'message' => 'Snapshot saved successfully!']);
        $this->emitUp('livewire-upload:finished'); // best-effort hook
    }

    public function closeModal($payload = null)
    {
        // placeholder if needed
    }

    public function render()
    {
        return view('bites::camera-capture-modal');
    }
}
