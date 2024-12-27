<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inovasi_daerah;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\InovasiExport;
use Maatwebsite\Excel\Facades\Excel;
class InovasiController extends Controller
{
    public function downloadPdf($id)
    {
        $inovasi = inovasi_daerah::findOrFail($id);

        $tahapanInovasiOptions = [
            'inisiatif' => 'Inisiatif',
            'uji_coba' => 'Uji Coba',
            'penerapan' => 'Penerapan',
        ];

        $pdf = Pdf::loadView('pdf.custom-header', [
            'nama_inovasi' => $inovasi->nama_inovasi,
            'dibuat_oleh' => $inovasi->dibuat_oleh,
            'tahapan_inovasi' => $tahapanInovasiOptions[$inovasi->tahapan_inovasi] ?? 'Tidak Diketahui', //$inovasi->tahapan_inovasi,
            'inisiator' => $inovasi->inisiator,
            'nama_inisiator' => $inovasi->nama_inisiator,
            'jenis_inovasi' => $inovasi->jenis_inovasi,
            'bentuk_inovasi' => $inovasi->bentuk_inovasi,
            'tematik' => $inovasi->tematik,
            'prioritas' => $inovasi->prioritas,
            'misi' => $inovasi->misi,
            'urusan_utama' => $inovasi->urusan_utama,
            'urusan_iris' => $inovasi->urusan_irisan,
            'waktu_uji' => $inovasi->waktu_uji,
            'waktu_penerapan' => $inovasi->waktu_penerapan,
            'berkembang' => $inovasi->berkembang,
            'dasar_hukum' => $inovasi->dasar_hukum,
            'masalah' => $inovasi->masalah,
            'isu_strategis' => $inovasi->isu_strategis,
            'metode_baru' => $inovasi->metode_baru,
            'keunggulan' => $inovasi->keunggulan,
            'spesifikasi_inovasi' => $inovasi->spesifikasi_inovasi,
            'tujuan' => $inovasi->tujuan,
            'manfaat' => $inovasi->manfaat,
        ]);

        // Load view PDF dengan data
       // $pdf = Pdf::loadView('pdf.custom-header', $data);

        // Download PDF dengan nama file khusus
        return $pdf->download('laporan-inovasi-'.$inovasi->id.'.pdf');
    }

    public function exportExcel($id)
    {
        return Excel::download(new InovasiExport($id), 'laporan-inovasi.xlsx');
    }
}
