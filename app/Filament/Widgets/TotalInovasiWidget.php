<?php

namespace App\Filament\Widgets;

use App\Models\daftarOpd; 
use App\Models\daftarUptd; 
use App\Models\inovasi_daerah; 
use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;

class TotalInovasiWidget extends Widget
{
    protected static string $view = 'filament.widgets.total-inovasi-widget';
    
    public ?string $opd_name = null;
    public ?string $uptd_name = null; 

    public function getOpdInovasiCount(): int
    {
        if ($this->opd_name) {
            //$opd = daftarOpd::where('nama_opd', 'like', "%{$this->opd_name}%")->first();
            $opd = daftarOpd::whereRaw('LOWER(nama_opd) = ?', [strtolower($this->opd_name)])->first();
            return $opd ? inovasi_daerah::where('opd_id', $opd->id)->count() : 0;
        }
        return 0; 
    }

    public function getUptdInovasiCount(): int
    {
        if ($this->uptd_name) {
            //$uptd = daftarUptd::where('nama_uptd', 'like', "%{$this->uptd_name}%")->first();
            $uptd = daftarUptd::whereRaw('LOWER(nama_uptd) = ?', [strtolower($this->uptd_name)])->first();
            return $uptd ? inovasi_daerah::where('uptd_id', $uptd->id)->count() : 0;
        }
        return 0; 
    }

    public function resetOpdSearch(): void
    {
        $this->opd_name = null;
    }

    public function resetUptdSearch(): void
    {
        $this->uptd_name = null;
    }

    public static function canView(): bool
    {
        return true; 
    }

    public $allOpds = [];
    public $allUptds = [];

    public function mount()
    {
        $this->allOpds = daftarOpd::all()->map(function ($opd) {
            return [
                'nama_opd' => $opd->nama_opd,
                // Hitung jumlah inovasi terkait secara manual
                'jumlah_inovasi' => inovasi_daerah::where('opd_id', $opd->id)->count(),
            ];
        })->toArray();

        $this->allUptds = daftarUptd::all()->map(function ($uptd) {
            return [
                'nama_uptd' => $uptd->nama_uptd,
                // Hitung jumlah inovasi terkait secara manual
                'jumlah_inovasi' => inovasi_daerah::where('uptd_id', $uptd->id)->count(),
            ];
        })->toArray();
    }

    public function render(): View
    {
        return view('filament.widgets.total-inovasi-widget', [
            'allOpds' => $this->allOpds,
            'allUptds' => $this->allUptds,
        ]);
    }

}
