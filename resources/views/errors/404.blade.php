@extends('layouts.main')
@section('content')
<div class="col-lg-12">

    <section class="content">
        <div class="error-page">
          <h2 class="headline text-warning">404</h2>
          <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! halaman yang anda tuju tidak ditemukan.</h3>

            <p>
              Aplikasi tidak bisa membaca apa yang anda lakukan, saran dari sistem adalah :
            </p>

<ol>
<li>Klik menu HOME</li>
<li>Pilih LOGOUT</li>
<li>Login kembali</li>
<li>Ulangi proses yang anda akan kerjakan</li>
<li>pastikan proses yang anda kerjakan sesuai dengan perintah yang tersedia/pastikan inputan benar</li>
</ol>

<a href="/">go Home</a>
          </div>
          <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
      </section>
</div>

@endsection
