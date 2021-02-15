@extends('layouts.main')
@section('content')
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ $aksi ?? '' }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('poli.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label class="col-form-label" for="tanggal">Hari, tanggal</label>
                                <input type="text" class="form-control" id="tanggal" name="tanggal"
                                    value="{{ Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label" for="poli">Poli</label>
                                <select class="custom-select form-control-border border-width-2 form-control-sm" name="poli" id="poli">
                                    {!! KustomHelper::getPoli() !!}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="inputSuccess">Pencarian data pasien</label>
                        <div class="input-group">
                            <input type="search" class="form-control form-control-sm" placeholder="cari data pasien by [Nama,NIK,No RM] "
                                name="searchpasien" id="searchpasien" />
                            <div class="input-group-append">
                                <a href="/pasien/create" class="btn btn-success btn-sm">
                                    <i class="fa fa-user-plus"></i> Pasien baru
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- DIRECT CHAT SUCCESS -->
                            <div class="card card-success card-outline direct-chat direct-chat-success shadow-sm">
                                <div class="card-header bg-success">
                                    <h3 class="card-title">[data Pasien]</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-xs" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-xs" data-card-widget="remove">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body m-2" style="display: block;">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nik">NIK</label>
                                                <input type="text"
                                                    class="form-control form-control-border border-width-2 form-control-sm"
                                                    id="nik" value="3208102311880001" disabled />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nik">No. RM</label>
                                                <input type="text"
                                                    class="form-control form-control-border border-width-2 form-control-sm"
                                                    id="nik" value="01000001" disabled />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nik">Nama pasien</label>
                                                <input type="text"
                                                    class="form-control form-control-border border-width-2 form-control-sm"
                                                    id="nik" value="Umar Wirahadi" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nik">Tgl. lahir</label>
                                                <input type="text"
                                                    class="form-control form-control-border border-width-2 form-control-sm"
                                                    id="nik" value="23 November 1988" disabled />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nik">Usia sekarang</label>
                                                <input type="text"
                                                    class="form-control form-control-border border-width-2 form-control-sm"
                                                    id="nik" value="32 tahun 2 bulan" disabled />
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="nik">Jenis kelamin</label>
                                                <input type="text"
                                                    class="form-control form-control-border border-width-2 form-control-sm"
                                                    id="nik" value="L" disabled />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nik">No. HP</label>
                                                <input type="text"
                                                    class="form-control form-control-border border-width-2 form-control-sm"
                                                    id="hp" value="0872121215" disabled />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nik">Alamat</label>
                                                <input type="text"
                                                    class="form-control form-control-border border-width-2 form-control-sm"
                                                    id="nik"
                                                    value="Jl. Cijerah II Gg. Nusa Indah 7 no. 35 Blok 14 RT/RW. 01/20"
                                                    disabled />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="status_pasien">Cara bayar</label>
                                                <select class="custom-select form-control-border border-width-2"
                                                    name="status_pasien" id="status_pasien">
                                                    {!! KustomHelper::getItem('cara-bayar') !!}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
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
                        <button type="submit" class="btn btn-sm btn-primary" name="submit"><i class="fa fa-user-nurse"></i> Daftar</button>
                        <button type="button" class="btn btn-sm btn-success" name="print"><i class="fa fa-print"></i> Print</button>
                        <button type="button" class="btn btn-sm btn-warning" name="kembali" onclick="window.location.href='/pendaftaran'"><i class="fa fa-undo"></i> Kembali</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                Catatan : form pendaftaran kunjungan pasien, jika data pasien baru silahkan klik tombol, pasien baru
            </div>

        </div>
    </div>

@endsection
