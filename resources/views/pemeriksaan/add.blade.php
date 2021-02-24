@extends('layouts.main')
@section('content')
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $aksi ?? '' }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('pendaftaran.store') }}" method="POST" id="form-pendaftaran-pasien">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label class="col-form-label" for="tanggal">Hari, tanggal</label>
                                <input type="text" class="form-control" id="tanggal" name="tanggal"
                                    value="{{ Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label" for="poli">Poli</label>
                                <select class="custom-select form-control" name="poli" id="poli">
                                    {!! KustomHelper::getPoli() !!}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="cara_bayar">Cara bayar</label>
                                <select class="custom-select form-control" name="cara_bayar" id="cara_bayar">
                                    {!! KustomHelper::getItem('cara-bayar') !!}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="cari_pasien">Pencarian data pasien</label>
                        <div class="input-group">
                            <input type="search" class="form-control form-control-sm" placeholder="cari data pasien by [Nama,NIK,No RM] "
                                name="cari_pasien" id="cari_pasien" />
                            <div class="input-group-append">
                                <button  type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addnewpasien">
                                    <i class="fa fa-user-plus"></i> Pasien baru
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- DIRECT CHAT SUCCESS -->
                            <div class="card card-success card-outline direct-chat direct-chat-success shadow-sm">
                                {{-- <div class="card-header bg-success">
                                    <h3 class="card-title">[data Pasien]</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-xs" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-xs" data-card-widget="remove">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div> --}}
                                <!-- /.card-header -->
                                <div class="card-body m-2" style="display: block;">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nik2">NIK</label>
                                                <input type="text"
                                                    class="form-control form-control-border border-width-2 form-control-sm"
                                                    id="nik2" value="" readonly />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="no_rm">No. RM</label>
                                                <input type="hidden" name="id_pasien2" id="id_pasien2" value="">
                                                <input type="hidden" name="usia_tahun" id="usia_tahun" value="">
                                                <input type="hidden" name="usia_bulan" id="usia_bulan" value="">
                                                <input type="hidden" name="usia_hari" id="usia_hari" value="">
                                                <input type="hidden" name="cara_daftar" id="cara_daftar" value="LANGSUNG">
                                                <input type="text" class="form-control form-control-border border-width-2 form-control-sm" name="no_rm"
                                                    id="no_rm" value="" readonly />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_lengkap2">Nama pasien</label>
                                                <input type="text"
                                                    class="form-control form-control-border border-width-2 form-control-sm"
                                                    id="nama_lengkap2" value="" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tgl. lahir</label>
                                                <input type="text"
                                                    class="form-control form-control-border border-width-2 form-control-sm"
                                                    id="tanggal_lahir" value="" readonly />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="usia">Usia sekarang</label>
                                                <input type="text"
                                                    class="form-control form-control-border border-width-2 form-control-sm"
                                                    id="usia" value="" readonly />
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="jk">Jenis kelamin</label>
                                                <input type="text"
                                                    class="form-control form-control-border border-width-2 form-control-sm"
                                                    id="jk" value="" readonly />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="hp2">No. HP</label>
                                                <input type="text"
                                                    class="form-control form-control-border border-width-2 form-control-sm"
                                                    id="hp2" value="" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="alamat2">Alamat</label>
                                                <input type="text"
                                                    class="form-control form-control-border border-width-2 form-control-sm"
                                                    id="alamat2" value="" readonly />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">                                   
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-form-label" for="inputSuccess">Catatan</label>
                                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="3"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <!-- /.card-footer-->
                            </div>
                            <!--/.direct-chat -->
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-app bg-success"><i class="fa fa-user-nurse"></i> Daftar</button>
                        <button type="reset" class="btn btn-app bg-warning" name="ulang"><i class="fa fa-sync"></i> Ulang</button>
                        <button type="button" class="btn btn-app bg-blue" name="print" data-toggle="modal" data-target="#cetak-retribusi"><i class="fa fa-print"></i> Print</button>
                        <button type="button" class="btn btn-app bg-danger" name="kembali" onclick="window.location.href='/pendaftaran'"><i class="fa fa-undo"></i> Kembali</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                Catatan : form pendaftaran kunjungan pasien, jika data pasien baru silahkan klik tombol, pasien baru
            </div>

        </div>
    </div>


@include('pendaftaran.print')
@include('pendaftaran.addnew')
@endsection
