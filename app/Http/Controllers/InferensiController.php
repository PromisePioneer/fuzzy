<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Inferensi;
use Illuminate\Http\Request;

class InferensiController extends Controller
{
    // Pendapatan
    public function pendapatanRendah($pendapatan)
    {
        if ($pendapatan >= 700000 && $pendapatan <= 2500000)
            return 1;
        else if ($pendapatan > 2500000 && $pendapatan <= 10000000)
            return number_format((10000000 - $pendapatan) / 7500000, 2, '.', '');
        else
            return 0;
    }

    public function pendapatanSedang($pendapatan)
    {
        if ($pendapatan >= 2000000 && $pendapatan <= 5000000)
            return number_format(($pendapatan - 2000000) / 3000000, 2, '.', '');
        else if ($pendapatan > 5000000 && $pendapatan <= 10000000)
            return number_format((10000000 - $pendapatan) / 5000000, 2, '.', '');
        else
            return 0;
    }

    public function pendapatanTinggi($pendapatan)
    {
        if ($pendapatan >= 4000000 && $pendapatan <= 10000000)
            return number_format(($pendapatan - 4000000) / 6000000, 2, '.', '');
        else
            return 0;
    }

    //Tanggungan
    public function tanggunganRendah($tanggungan)
    {
        if ($tanggungan >= 1 && $tanggungan <= 3)
            return 1;
        else if ($tanggungan > 3 && $tanggungan <= 5)
            return (5 - $tanggungan) / 2;
        else return 0;
    }

    public function tanggunganSedang($tanggungan)
    {
        if ($tanggungan >= 2 && $tanggungan <= 4)
            return ($tanggungan - 2) / 2;
        else if ($tanggungan > 4 && $tanggungan <= 5)
            return (5 - $tanggungan) / 1;
        else return 0;
    }

    public function tanggunganTinggi($tanggungan)
    {
        if ($tanggungan  >= 3 && $tanggungan  <= 5)
            return ($tanggungan  - 3) / 2;
        else return 0;
    }


    public function raportRendah($raport)
    {
        if ($raport>= 80 && $raport<= 85) return 1;
        else if ($raport> 85 && $raport<= 100) return (100 - $raport) / 15;
        else return 0;
    }

    public function raportSedang($raport)
    {
        if ($raport>= 83 && $raport <= 95) return ($raport - 83) / 12;
        else if ($raport > 95 && $raport <= 100) return (100 - $raport) / 5;
        else return 0;
    }

    public function raportTinggi($raport)
    {
        if ($raport >= 90 && $raport <= 100) return 1;
        else return 0;
    }


    public function prestasiRendah($prestasi)
    {
        if ($prestasi >= 0 && $prestasi <= 4)
            return 1;
        else if ($prestasi > 4 && $prestasi <= 10)
            return number_format((10 - $prestasi) / 6, 2, '.', '');
        else return 0;
    }

    public function prestasiSedang($prestasi)
    {
        if ($prestasi >= 3 && $prestasi <= 6)
            return number_format(($prestasi - 3) / 3, 2, '.', '');
        else if ($prestasi > 6 && $prestasi <= 10)
            return number_format((10 - $prestasi) / 4, 2, '.', '');
        else return 0;
    }

    public function prestasiTinggi($prestasi)
    {
        if ($prestasi >= 5 && $prestasi <= 10)
            return 1;
        else
            return 0;
    }


    public function essayRendah($essay)
    {
        if ($essay >= 75 && $essay <= 85) return 1;
        else if ($essay > 85 && $essay <= 100) return (100 - $essay) / 15;
        else return 0;
    }

    public function essaySedang($essay)
    {
        if ($essay >= 82 && $essay <= 93) return ($essay - 82) / 11;
        else if ($essay > 93 && $essay <= 100) return (100 - $essay) / 7;
        else return 0;
    }

    public function essayTinggi($essay)
    {
        if ($essay >= 91 && $essay <= 100) return 1;
        else return 0;
    }

    public function calcInferensi(Request $request,Dataset $dataset)
    {
       $inferensi = Inferensi::create([
            'id_dataset' => $dataset->id,
            'pendapatan_rendah' => $this->pendapatanRendah($dataset->pendapatan_ortu),
            'pendapatan_sedang' => $this->pendapatanSedang($dataset->pendapatan_ortu),
            'pendapatan_tinggi' => $this->pendapatanTinggi($dataset->pendapatan_ortu),
            'tanggungan_rendah' => $this->tanggunganRendah($dataset->tanggungan_ortu),
            'tanggungan_sedang' => $this->tanggunganSedang($dataset->tanggungan_ortu),
            'tanggungan_tinggi' => $this->tanggunganTinggi($dataset->tanggungan_ortu),
            'prestasi_rendah' => $this->prestasiRendah($dataset->jumlah_prestasi),
            'prestasi_sedang' => $this->prestasiSedang($dataset->jumlah_prestasi),
            'prestasi_tinggi' => $this->prestasiTinggi($dataset->jumlah_prestasi),
            'raport_rendah' => $this->raportRendah($dataset->nilai_raport),
            'raport_sedang' => $this->raportSedang($dataset->nilai_raport),
            'raport_tinggi' => $this->raportTinggi($dataset->nilai_raport),
            'essay_rendah' => $this->essayRendah($dataset->nilai_essay),
            'essay_sedang' => $this->essaySedang($dataset->nilai_essay),
            'essay_tinggi' => $this->essayTinggi($dataset->nilai_essay)
        ]);

       return response()->json($inferensi);
    }
}
