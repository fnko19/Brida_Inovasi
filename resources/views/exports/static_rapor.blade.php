
<table>
    <!-- Header -->
    <tr>
        <th colspan="4">RAPOR INOVASI</th>
    </tr>
    <tr>
        <td colspan="6">Nama Perangkat Daerah / Perusda / Puskesmas / UPT</td>
        <td colspan="6">: {{ $namaPerangkatDaerah }} </td>
    </tr>
    <tr>
        <td colspan="2">Nama Inovasi</td>
        <td colspan="2">: {{ $inovasi->nama_inovasi }}</td>
    </tr>
    <tr>
        <td colspan="2">Tahun Inovasi</td>
        <td colspan="2">: {{ $inovasi->created_at->year }}</td>
    </tr>
    <tr>
        <td colspan="8"></td>
    </tr>
    <!-- Profil Inovasi -->
    <tr>
        <th colspan="4">PROFIL INOVASI</th>
    </tr>
    <tr>
        <th>No</th>
        <th colspan="2">Profil</th>
        <th>Evaluasi</th>
        <th>Keterangan</th>
    </tr>
    <tr>
        <td>1</td>
        <td colspan="2">Rancang Bangun</td>
        <td>100</td>
        <td></td>
    </tr>
    <tr>
        <td>2</td>
        <td colspan="2">Tujuan</td>
        <td>100</td>
        <td></td>
    </tr>
    <tr>
        <td>3</td>
        <td colspan="2">Manfaat</td>
        <td>100</td>
        <td></td>
    </tr>
    <tr>
        <td>4</td>
        <td colspan="2">Hasil</td>
        <td>50</td>
        <td></td>
    </tr>

    <tr>
        <td colspan="8"></td>
    </tr>

    <!-- Tabel Eviden/Indikator -->
    <tr>
        <th colspan="6">EVIDEN/INDIKATOR</th>
    </tr>
    <tr>
        <th class="">No</th>
        <th colspan="5">Indikator</th>
        <th colspan="3">Bobot/Eviden (A)</th>
        <th colspan="2">Parameter (B)</th>
        <th colspan="2">Nilai (AxB)</th>
        <th>Keterangan</th>
    </tr>
    <tr>
        <td>1</td>
        <td colspan="5">Regulasi Inovasi Daerah</td>
        <td colspan="3">{{ $indikator1 }}</td>  
        <td colspan="2">3</td> 
        <td colspan="2">{{ $hasilPerkalian1 }}</td>
        <td></td>
    </tr>
    <tr>
    <td>2</td>
    <td colspan="5">Ketersediaan SDM Terhadap Inovasi Daerah</td>
    <td colspan="3">{{ $indikator2 }}</td>  
    <td colspan="2">2</td> 
    <td colspan="2">{{ $hasilPerkalian2 }}</td>
    <td></td>
</tr>
<tr>
    <td>3</td>
    <td colspan="5">Dukungan Anggaran</td>
    <td colspan="3">{{ $indikator3 }}</td>  
    <td colspan="2">2</td> 
    <td colspan="2">{{ $hasilPerkalian3 }}</td>
    <td></td>
</tr>
<tr>
    <td>4</td>
    <td colspan="5">Penggunaan IT</td>
    <td colspan="3">{{ $indikator4 }}</td>  
    <td colspan="2">2</td> 
    <td colspan="2">{{ $hasilPerkalian4 }}</td>
    <td></td>
</tr>
<tr>
    <td>5</td>
    <td colspan="5">Bimtek Inovasi</td>
    <td colspan="3">{{ $indikator5 }}</td>  
    <td colspan="2">1</td> 
    <td colspan="2">{{ $hasilPerkalian5 }}</td>
    <td></td>
</tr>
<tr>
    <td>6</td>
    <td colspan="5">Integrasi Program Dan Kegiatan Inovasi Dalam RKPD</td>
    <td colspan="3">{{ $indikator6 }}</td>  
    <td colspan="2">2</td> 
    <td colspan="2">{{ $hasilPerkalian6 }}</td>
    <td></td>
</tr>
<tr>
    <td>7</td>
    <td colspan="5">Jejaring Inovasi</td>
    <td colspan="3">{{ $indikator7 }}</td>  
    <td colspan="2">1</td> 
    <td colspan="2">{{ $hasilPerkalian7 }}</td>
    <td></td>
</tr>
<tr>
    <td>8</td>
    <td colspan="5">Replikasi</td>
    <td colspan="3">{{ $indikator8 }}</td>  
    <td colspan="2">1</td> 
    <td colspan="2">{{ $hasilPerkalian8 }}</td>
    <td></td>
</tr>
<tr>
    <td>9</td>
    <td colspan="5">Pedoman Teknis</td>
    <td colspan="3">{{ $indikator9 }}</td>  
    <td colspan="2">1</td> 
    <td colspan="2">{{ $hasilPerkalian9 }}</td>
    <td></td>
</tr>
<tr>
    <td>10</td>
    <td colspan="5">Pelaksana Inovasi Daerah</td>
    <td colspan="3">{{ $indikator10 }}</td>  
    <td colspan="2">1</td> 
    <td colspan="2">{{ $hasilPerkalian10 }}</td>
    <td></td>
</tr>
<tr>
    <td>11</td>
    <td colspan="5">Kemudahan Informasi Layanan</td>
    <td colspan="3">{{ $indikator11 }}</td>  
    <td colspan="2">1</td> 
    <td colspan="2">{{ $hasilPerkalian11 }}</td>
    <td></td>
</tr>
<tr>
    <td>12</td>
    <td colspan="5">Penyelesaian Layanan Pengaduan</td>
    <td colspan="3">{{ $indikator12 }}</td>  
    <td colspan="2">1</td> 
    <td colspan="2">{{ $hasilPerkalian12 }}</td>
    <td></td>
</tr>
<tr>
    <td>13</td>
    <td colspan="5">Keterlibatan Aktor Inovasi</td>
    <td colspan="3">{{ $indikator13 }}</td>  
    <td colspan="2">2</td> 
    <td colspan="2">{{ $hasilPerkalian13 }}</td>
    <td></td>
</tr>
<tr>
    <td>14</td>
    <td colspan="5">Kemudahan Proses Inovasi yang Dihasilkan</td>
    <td colspan="3">{{ $indikator14 }}</td>  
    <td colspan="2">1</td> 
    <td colspan="2">{{ $hasilPerkalian14 }}</td>
    <td></td>
</tr>
<tr>
    <td>15</td>
    <td colspan="5">Online Sistem</td>
    <td colspan="3">{{ $indikator15 }}</td>  
    <td colspan="2">2</td> 
    <td colspan="2">{{ $hasilPerkalian15 }}</td>
    <td></td>
</tr>
<tr>
    <td>16</td>
    <td colspan="5">Kecepatan Penciptaan Inovasi</td>
    <td colspan="3">{{ $indikator16 }}</td>  
    <td colspan="2">3</td> 
    <td colspan="2">{{ $hasilPerkalian16 }}</td> 
    <td></td>
</tr>
<tr>
    <td>17</td>
    <td colspan="5">Kemanfaatan Inovasi</td>
    <td colspan="3">{{ $indikator17 }}</td>  
    <td colspan="2">2</td> 
    <td colspan="2">{{ $hasilPerkalian17 }}</td>
    <td></td>
</tr>
<tr>
    <td>18</td>
    <td colspan="5">Monitoring dan Evaluasi Inovasi Daerah</td>
    <td colspan="3">{{ $indikator18 }}</td>  
    <td colspan="2">3</td> 
    <td colspan="2">{{ $hasilPerkalian18 }}</td> 
    <td></td>
</tr>
<tr>
    <td>19</td>
    <td colspan="5">Sosialisasi Inovasi Daerah</td>
    <td colspan="3">{{ $indikator19}}</td> 
    <td colspan="2">2</td> 
    <td colspan="2">{{ $hasilPerkalian19 }}</td>
    <td></td>
</tr>
<tr>
    <td>20</td>
    <td colspan="5">Kualitas Inovasi Daerah</td>
    <td colspan="3">{{ $indikator20 }}</td> 
    <td colspan="2">4</td> 
    <td colspan="2">{{ $hasilPerkalian20 }}</td> 
    <td></td>
</tr>

    <tr>
        <td colspan="11">KEMATANGAN INOVASI</td>
        <td colspan="2">{{ $skorKematangan }}</td>
        <td>
            @if ($skorKematangan == 0)
                Tidak dapat dinilai
            @elseif ($skorKematangan > 0 && $skorKematangan <= 50)
                Kurang Inovatif
            @elseif ($skorKematangan > 50 && $skorKematangan <= 80)
                Cukup Inovatif
            @elseif ($skorKematangan > 80 && $skorKematangan <= 100)
                Inovatif
            @elseif ($skorKematangan > 100 && $skorKematangan <= 111)
                Sangat Inovatif
            @else
                Tidak Valid
            @endif
        </td>
    </tr>
    <tr>
        <td colspan="8"></td>
    </tr>

    <!-- Range Penilaian -->
    <tr>
        <th colspan="6">RANGE PENILAIAN</th>
    </tr>
    <tr>
        <td>0: Tidak dapat dinilai</td>
    </tr>
    <tr>
        <td>0,01 - 50: Kurang Inovatif</td>
    </tr>
    <tr>
        <td>50,01 - 80: Cukup Inovatif</td>
    </tr>
    <tr>
        <td>80,01 - 100: Inovatif</td>
    </tr>
    <tr>
        <td>100,01 - 111: Sangat Inovatif</td>
    </tr>
</table>
