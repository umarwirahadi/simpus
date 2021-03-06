 <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/" class="nav-link">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Master</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="/puskesmas" class="dropdown-item">- Profile Puskesmas</a></li>
                <li><a href="/item" class="dropdown-item">- Item </a></li>
                <li><a href="/icd" class="dropdown-item">- ICD-10 </a></li>
                <li><a href="/wilayah" class="dropdown-item">- Alamat </a></li>
                <li class="dropdown-divider"></li>
                <li><a href="/settingpcare" class="dropdown-item">- Bridging BPJS </a></li>
                <li><a href="/settingdisduk" class="dropdown-item">- Bridging DISDUK </a></li>
                <li class="dropdown-divider"></li>
                <li><a href="/user" class="dropdown-item">- Pengguna Aplikasi </a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Data</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="/pasien" class="dropdown-item">- Pasien</a></li>
                <li><a href="/poli" class="dropdown-item">- Poli </a></li>
                <li><a href="/rekening" class="dropdown-item">- Rekening </a></li>
                <li><a href="/obat" class="dropdown-item">- Obat </a></li>
                <li><a href="/faskes" class="dropdown-item">- Faskes </a></li>
                <li><a href="/tenagamedis" class="dropdown-item">- Tenaga medis </a></li>
              <li class="dropdown-divider"></li>

              <!-- Level two dropdown-->
              {{-- <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Sapras</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item">Gedung/ruang</a>
                  </li>

                  <!-- Level three dropdown-->
                  <li class="dropdown-submenu">
                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                    </ul>
                  </li>
                  <!-- End Level three -->

                  <li><a href="#" class="dropdown-item">level 2</a></li>
                  <li><a href="#" class="dropdown-item">level 2</a></li>
                </ul>
              </li> --}}
              {{-- <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">SDM</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item">Dokter</a>
                  </li>
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item">Pegawai</a>
                  </li>

                  <!-- Level three dropdown-->
                  <li class="dropdown-submenu">
                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                    </ul>
                  </li>
                  <!-- End Level three -->

                  <li><a href="#" class="dropdown-item">level 2</a></li>
                  <li><a href="#" class="dropdown-item">level 2</a></li>
                </ul>
              </li> --}}
              <!-- End Level two -->
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Transaksi</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="/pendaftaran" class="dropdown-item"><i class="fa fa-arrow-circle-right"></i> Pendaftaran</a></li>
                <li><a href="{{route('pemeriksaan.index')}}" class="dropdown-item"><i class="fa fa-arrow-circle-right"></i> Pemeriksaan </a></li>
                <li><a href="{{route('farmasi.index')}}" class="dropdown-item"><i class="fa fa-arrow-circle-right"></i> Farmasi </a></li>
                <li><a href="/billing" class="dropdown-item"><i class="fa fa-arrow-circle-right"></i> Billing </a></li>
                <li class="dropdown-divider"></li>
                <li><a href="/laboratorium" class="dropdown-item"><i class="fa fa-arrow-circle-right"></i> Lab </a></li>
                <li class="dropdown-divider"></li>

              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Rekam medis</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li><a href="{{route('monitoring.berkasrm')}}" class="dropdown-item">Monitoring berkas</a></li>
                  <li><a href="#" class="dropdown-item">Kelengkapan berkas</a></li>
                  <li><a href="#" class="dropdown-item">KIA</a></li>
                  <li><a href="#" class="dropdown-item">Penyakit</a></li>
                </ul>
              </li>
              <!-- End Level two -->
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Laporan</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">- Kunjungan </a></li>
              <li><a href="#" class="dropdown-item">- Pemeriksaan</a></li>
              <li><a href="#" class="dropdown-item">- Penyakit</a></li>

              <li class="dropdown-divider"></li>

              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                  </li>

                  <!-- Level three dropdown-->
                  <li class="dropdown-submenu">
                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                    </ul>
                  </li>
                  <!-- End Level three -->

                  <li><a href="#" class="dropdown-item">level 2</a></li>
                  <li><a href="#" class="dropdown-item">level 2</a></li>
                </ul>
              </li>
              <!-- End Level two -->
            </ul>
          </li>
        </ul>
