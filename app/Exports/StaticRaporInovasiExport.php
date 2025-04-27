<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\inovasi_daerah;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class StaticRaporInovasiExport implements FromView
{
    protected $inovasi;

    public function __construct($inovasiId)
    {
        $this->inovasi = inovasi_daerah::findOrFail($inovasiId);
    }

    public function view(): View
    {
        $indikator1 = $this->inovasi->indikatorSatu->first()?->parameter ?? 'Lainnya';
        $indikator2 = $this->inovasi->indikatorDua->first()?->parameter2 ?? 'Lainnya';
        $indikator3 = $this->inovasi->indikatorTiga->first()?->parameter3 ?? 'Lainnya';
        $indikator4 = $this->inovasi->indikatorEmpat->first()?->parameter4 ?? 'Lainnya';
        $indikator5 = $this->inovasi->indikatorLima->first()?->parameter5 ?? 'Lainnya';
        $indikator6 = $this->inovasi->indikatorEnam->first()?->parameter6 ?? 'Lainnya';
        $indikator7 = $this->inovasi->indikatorTujuh->first()?->parameter7 ?? 'Lainnya';
        $indikator8 = $this->inovasi->indikatorDelapan->first()?->parameter8 ?? 'Lainnya';
        $indikator9 = $this->inovasi->indikatorSembilan->first()?->parameter9 ?? 'Lainnya';
        $indikator10 = $this->inovasi->indikatorSepuluh->first()?->parameter10 ?? 'Lainnya';
        $indikator11 = $this->inovasi->indikatorSebelas->first()?->parameter11 ?? 'Lainnya';
        $indikator12 = $this->inovasi->indikatorDuabelas->first()?->parameter12 ?? 'Lainnya';
        $indikator13 = $this->inovasi->indikatorTigabelas->first()?->parameter13 ?? 'Lainnya';
        $indikator14 = $this->inovasi->indikatorEmpatbelas->first()?->parameter14 ?? 'Lainnya';
        $indikator15 = $this->inovasi->indikatorLimabelas->first()?->parameter15 ?? 'Lainnya';
        $indikator16 = $this->inovasi->indikatorEnambelas->first()?->parameter16 ?? 'Lainnya';
        $indikator17 = $this->inovasi->indikatorTujuhbelas->first()?->parameter17 ?? 'Lainnya';
        $indikator18 = $this->inovasi->indikatorDelapanbelas->first()?->parameter18 ?? 'Lainnya';
        $indikator19 = $this->inovasi->indikatorSembilanbelas->first()?->parameter19 ?? 'Lainnya';
        $indikator20 = $this->inovasi->indikatorDuapuluh->first()?->parameter20 ?? 'Lainnya';

        $indikatorValue1 = match ($indikator1) {
            'SK Kepala Perangkat Daerah' => 1,
            'SK Kepala Daerah' => 2,
            'Peraturan Kepala Daerah/Peraturan Daerah' =>3,
            default => 0,
        };

        $indikatorValue2 = match ($indikator2) {
            '1-10 SDM' => 1,
            '11-30 SDM' => 2,
            'Lebih dari 30' => 3,
            default => 0,
        };

        $indikatorValue3 = match ($indikator3) {
            'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0 (Tahun Berjalan)' => 1,
            'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-1 atau T-2' => 2,
            'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0, T-1 dan T-3' => 3,
            default => 0,
        };
        
        $indikatorValue4 = match ($indikator4) {
            'Pelaksanaan kerja secara manual/non elektronik' => 1,
            'Pelaksanaan kerja secara elektronik' => 2,
            'Pelaksanaan kerja sudah didukung sistem informasi online/daring' => 3,
            default => 0,
        };
        
        $indikatorValue5 = match ($indikator5) {
            'Dalam 2 tahun terakhir pernah 1 kali kegiatan transfer pengetahuan (bimtek, sharing, FGB atau kegiatan transfer pengetahuan lain' => 1,
            'Dalam 2 tahun terakhir pernah 2 kali bimtek (bimtek, training dan TOT)' => 2,
            'Dalam 2 tahun terakhir pernah lebih dari 2 kali bimtek (bimtek, training dan TOT)' => 3,
            default => 0,
        };
        
        $indikatorValue6 = match ($indikator6) {
            'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1 atau T-2' => 1,
            'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1 dan T-2' => 2,
            'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1, T-2 dan T0 (T0 adalah Tahun Berjalan)' => 3,
            default => 0,
        };
        
        $indikatorValue7 = match ($indikator7) {
            'Inovasi melibatkan 3 aktor'  => 1,
            'Inovasi melibatkan 4 aktor' => 2,
            'Inovasi melibatkan 5 aktor atau lebih' => 3,
            default => 0,
        };
        
        $indikatorValue8 = match ($indikator8) {
            'Ada Pelaksana namun tidak ditetapkan dengan SK Kepala Perangkat Daerah'  => 1,
            'Ada pelaksana dan ditetapkan dengan SK Kepala Perangkat Daerah' => 2,
            'Ada Pelaksana dan ditetapkan dengan SK Kepala Daerah' => 3,
            default => 0,
        };
        
        $indikatorValue9 = match ($indikator9) {
            'Inovasi melibatkan 1-2 Perangkat Daerah'  => 1,
            'Inovasi melibatkan 3-4 Perangkat Daerah' => 2,
            'Inovasi melibatkan 5 Perangkat Daerah atau lebih' => 3,
            default => 0,
        };
        
        $indikatorValue10 = match ($indikator10) {
            'Sosialisasi tatap muka baik secara langsung ataupun virtual (luring/during) atau sosialisasi menggunakan media fisik seperti pamflet, banner, baliho, pameran, dsb'  => 1,
            'Konten melalui media sosial' => 2,
            'Media berita' => 3,
            default => 0,
        };
        
        $indikatorValue11 = match ($indikator11) {
            'Telah terdapat Pedoman teknis berupa buku manual' => 1,
            'Telah terdapat Pedoman teknis berupa buku dalam bentuk elektronik' => 2,
            'Telah terdapat Pedoman teknis berupa buku yang dapat diakses secara online atau berupa video tutorial' => 3,
            default => 0,
        };
        
        $indikatorValue12 = match ($indikator12) {
            'Informasi layanan diperoleh melalui 1 dari 4 metode' => 1,
            'Informasi layanan diperoleh melalui 2 dari 4 metode' => 2,
            'Informasi layanan diperoleh melalui 3 atau lebih metode' => 3,
            default => 0,
        };
        
        $indikatorValue13 = match ($indikator13) {
            'Hasil inovasi diperoleh dalam waktu 6 hari atau lebih' => 1,
            'Hasil inovasi diperoleh dalam waktu 2-5 hari' => 2,
            'Hasil inovasi diperoleh dalam waktu 1 hari' => 3,
            default => 0,
        };
        
        $indikatorValue14 = match ($indikator14) {
            'Kurang dari sama dengan 50% atau Tidak ada pengaduan' => 1,
            '51% s.d 86%' => 2,
            'lebih dari sama dengan 86%' => 3,
            default => 0,
        };
        
        $indikatorValue15 = match ($indikator15) {
            'Tidak dapat diukur' => 0,
            'Ada dukungan melalui informasi website/sosial media/web aplikasi/ aplikasi mobile(android/ios) yang berjalan secara terpisah' => 1,
            'Ada dukungan melalui informasi website/sosial media/web aplikasi/ aplikasi mobile(android/ios) yang terintegrasi dalam satu portal pada unit organisasi yang bersangkutan' => 2,
            'Ada dukungan melalui informasi website/sosial media/web aplikasi/ aplikasi mobile(android/ios) yang layanan sudah terintegrasi dengan unit organisasi lain' => 3,
            'Layanan inovasi berjalan secara tersendiri (independen)' => 1,
            'Layanan masih terintegrasi dengan layanan lain pada program atau kegiatan lain pada satu unit organisasi atau dalam satu urusan pemerintahan' => 2,
            'Layanan masih terintegrasi dengan layanan lain pada program atau kegiatan lain pada unit organisasi lain atau dalam lebih dari satu urusan pemerintahan' => 3,
            default => 0,
        };
        
        $indikatorValue16 = match ($indikator16) {
            'Pernah 1 Kali direplikasi di daerah lain' => 1,
            'Pernah 2 Kali direplikasi di daerah lain' => 2,
            'Pernah 3 Kali direplikasi di daerah lain' => 3,
            default => 0,
        };
        
        $indikatorValue17 = match ($indikator17) {
            'Inovasi dapat diciptakan dalam waktu 9 bulan atau lebih' => 1,
            'Inovasi dapat diciptakan dalam waktu 5-8 bulan' => 2,
            'Inovasi dapat diciptakan dalam waktu 1-4 bulan' => 3,
            default => 0,
        };
        
        $indikatorValue18 = match ($indikator18) {
            'Tidak dapat diukur' => 0,
            'Jumlah pengguna atau penerima manfaat 1-100 orang' => 1,
            'Jumlah pengguna atau penerima manfaat 101-200 orang' => 2,
            'Jumlah pengguna atau penerima manfaat 201 orang atau lebih' => 3,
            'Persentase peningkatan jumlah unit 5,00% - 20,00%' => 1,
            'Persentase peningkatan jumlah unit 20,01% - 50,00%' => 2,
            'Persentase peningkatan jumlah unit > 50%' => 3,
            'Efisiensi belanja sebesar 0,01% - 10,00%' => 1,
            'Efisiensi belanja sebesar 10,01% - 20,00%' => 2,
            'Efisiensi belanja sebesar 20,01% - 30,00%' => 3,
            'Pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi 0,01%-49,99%' => 1,
            'Pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi 50,00%-99,99%' => 2,
            'Pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi lebih dari sama dengan 100%' => 3,
            'Jumlah produk yang dihasilkan atau diperjualbelikan 1-100 barang' => 1,
            'Jumlah produk yang dihasilkan atau diperjualbelikan 101-200 barang' => 2,
            'Jumlah produk yang dihasilkan atau diperjualbelikan lebih dari 200 barang' => 3,
            default => 0,
        };
        
        $indikatorValue19 = match ($indikator19) {
            'Hasil inovasi monev internal perangkat daerah' => 1,
            'Hasil pengukuran kepuasan pengguna dari evaluasi Survei Kepuasan Masyarakat' => 2,
            'Hasil laporan monev eksternal berdasarkan hasil penelitian/kajian/analisis' => 3,
            default => 0,
        };
        
        $indikatorValue20 = match ($indikator20) {
            'Memenuhi 1 atau 2 unsur substansi' => 1,
            'Memenuhi 3 atau 4 unsur substansi' => 2,
            'Memenuhi 5 unsur substansi' => 3,
            default => 0,
        };

        return view('exports.static_rapor', [
            'inovasi' => $this->inovasi,
            'skorKematangan' => $this->inovasi->skor_kematangan ?? 0,
            'namaPerangkatDaerah' => $this->getNamaPerangkatDaerah(),
            'indikator1' => $indikatorValue1,
            'hasilPerkalian1' => $indikatorValue1 * 3,
            'indikator2' => $indikatorValue2,
            'hasilPerkalian2' => $indikatorValue2 * 2,
            'indikator3' => $indikatorValue3,
            'hasilPerkalian3' => $indikatorValue3 * 2,
            'indikator4' => $indikatorValue4,
            'hasilPerkalian4' => $indikatorValue4 * 2,
            'indikator5' => $indikatorValue5,
            'hasilPerkalian5' => $indikatorValue5 * 1,
            'indikator6' => $indikatorValue6,
            'hasilPerkalian6' => $indikatorValue6 * 2,
            'indikator7' => $indikatorValue7,
            'hasilPerkalian7' => $indikatorValue7 * 1,
            'indikator8' => $indikatorValue8,
            'hasilPerkalian8' => $indikatorValue8 * 1,
            'indikator9' => $indikatorValue9,
            'hasilPerkalian9' => $indikatorValue9 * 1,
            'indikator10' => $indikatorValue10,
            'hasilPerkalian10' => $indikatorValue10 * 1,
            'indikator11' => $indikatorValue11,
            'hasilPerkalian11' => $indikatorValue11 * 1,
            'indikator12' => $indikatorValue12,
            'hasilPerkalian12' => $indikatorValue12 * 1,
            'indikator13' => $indikatorValue13,
            'hasilPerkalian13' => $indikatorValue13 * 2,
            'indikator14' => $indikatorValue14,
            'hasilPerkalian14' => $indikatorValue14 * 1,
            'indikator15' => $indikatorValue15,
            'hasilPerkalian15' => $indikatorValue15 * 2,
            'indikator16' => $indikatorValue16,
            'hasilPerkalian16' => $indikatorValue16 * 3,
            'indikator17' => $indikatorValue17,
            'hasilPerkalian17' => $indikatorValue17 * 2,
            'indikator18' => $indikatorValue18,
            'hasilPerkalian18' => $indikatorValue18 * 3,
            'indikator19' => $indikatorValue19,
            'hasilPerkalian19' => $indikatorValue19 * 2,
            'indikator20' => $indikatorValue20,
            'hasilPerkalian20' => $indikatorValue20 * 4,
        ]);
    }

    private function getNamaPerangkatDaerah()
    {
        if ($this->inovasi->uptd) {
            return $this->inovasi->uptd->nama_uptd;
        } elseif ($this->inovasi->opd) {
            return $this->inovasi->opd->nama_opd;
        } else {
            return '-'; 
        }
    }
}
