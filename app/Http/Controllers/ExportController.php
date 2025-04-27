<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\daftarOpd;
use App\Models\daftarUptd;

class ExportController extends Controller
{
    public function exportPdf()
    {
        $allOpds = daftarOpd::all();
        $allUptds = daftarUptd::all();

        foreach ($allOpds as $opd) {
            // Mengambil jumlah inovasi
            $opd->jumlah_inovasi = \DB::table('inovasi_daerahs')->where('opd_id', $opd->id)->count();

            // Mengambil nama inovasi pertama (atau default jika tidak ada inovasi)
            $opd->nama_inovasi = \DB::table('inovasi_daerahs')
                ->where('opd_id', $opd->id)
                ->value('nama_inovasi') ?? 'Tidak ada inovasi';
        }

        foreach ($allUptds as $uptd) {
            // Mengambil jumlah inovasi
            $uptd->jumlah_inovasi = \DB::table('inovasi_daerahs')->where('uptd_id', $uptd->id)->count();

            // Mengambil nama inovasi pertama (atau default jika tidak ada inovasi)
            $uptd->nama_inovasi = \DB::table('inovasi_daerahs')
                ->where('uptd_id', $uptd->id)
                ->value('nama_inovasi') ?? 'Tidak ada inovasi';
        }

        // Kirim data ke PDF view
        $pdf = Pdf::loadView('pdf.opd_uptd', compact('allOpds', 'allUptds'));
        return $pdf->download('Daftar_OPD_UPTD.pdf');
    }

}
