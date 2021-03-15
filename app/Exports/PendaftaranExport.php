<?php

namespace App\Exports;

// use App\Pendaftaran;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendaftaranExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
            $pendaftaran=DB::table('vpendaftaran')->select('no_pendaftaran','tanggal','waktu','no_rm','no_rm_lama',
                                   'nama_lengkap','jenis_kelamin','hp','alamat','rt','rw','kelurahan','cara_daftar',
                                   'tanggal_lahir','gol_darah','usia_tahun','usia_bulan','usia_hari','nama_poli','noantrian2')->where(['tanggal'=>date('Y-m-d')])->get();
            
        return $pendaftaran;
    }

    public function headings(): array
    {
        return [
            'NO pendaftaran',
            'Tanggal',
            'Waktu',
            'No. RM',
            'No. RM Lama',
            'Nama Lengkap',
            'Jenis Kelamin',
            'No. HP',
            'Alamat',
            'RT',
            'RW',
            'Kelurahan',
            'Cara Daftar',
            'Tgl. Lahir',
            'Gol. Darah',
            'Usia-tahun',
            'Usia-bulan',
            'Usia-hari',
            'Poli',
            'Nomor antrian'
        ];

    }
}
