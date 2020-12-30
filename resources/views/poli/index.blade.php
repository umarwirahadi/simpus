@extends('layouts.main')
@section('content')
<div class="table table-responsive">
     <div class="box">
            <div class="box-header">
                <button class="btn btn-sm btn-primary" id="tambahPoli"><span class="fa fa-plus"></span> Tambah</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Poli</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>
                      <a href="" class="btn btn-sm btn-primary" title="edit"><span class="fa fa-check-square-o"></span></a>
                      <a href="" class="btn btn-sm btn-danger" title="hapus"><span class="fa fa-trash-o"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.0
                  </td>
                  <td>Win 95+</td>
                  <td>5</td>
                  <td>
                      <a href="" class="btn btn-sm btn-primary" title="edit"><span class="fa fa-check-square-o"></span></a>
                      <a href="" class="btn btn-sm btn-danger" title="hapus"><span class="fa fa-trash-o"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.5
                  </td>
                  <td>Win 95+</td>
                  <td>5.5</td>
                  <td>
                      <a href="" class="btn btn-sm btn-primary" title="edit"><span class="fa fa-check-square-o"></span></a>
                      <a href="" class="btn btn-sm btn-danger" title="hapus"><span class="fa fa-trash-o"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 6
                  </td>
                  <td>Win 98+</td>
                  <td>6</td>
                  <td>
                      <a href="" class="btn btn-sm btn-primary" title="edit"><span class="fa fa-check-square-o"></span></a>
                      <a href="" class="btn btn-sm btn-danger" title="hapus"><span class="fa fa-trash-o"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet Explorer 7</td>
                  <td>Win XP SP2+</td>
                  <td>7</td>
                  <td>
                      <a href="" class="btn btn-sm btn-primary" title="edit"><span class="fa fa-check-square-o"></span></a>
                      <a href="" class="btn btn-sm btn-danger" title="hapus"><span class="fa fa-trash-o"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>AOL browser (AOL desktop)</td>
                  <td>Win XP</td>
                  <td>6</td>
                  <td>
                      <a href="" class="btn btn-sm btn-primary" title="edit"><span class="fa fa-check-square-o"></span></a>
                      <a href="" class="btn btn-sm btn-danger" title="hapus"><span class="fa fa-trash-o"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 1.0</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.7</td>
                  <td>
                      <a href="" class="btn btn-sm btn-primary" title="edit"><span class="fa fa-check-square-o"></span></a>
                      <a href="" class="btn btn-sm btn-danger" title="hapus"><span class="fa fa-trash-o"></span></a>
                  </td>
                </tr>
                <tr>
                  <td>Gecko</td>
                  <td>Firefox 1.5</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>
                      <a href="" class="btn btn-sm btn-primary" title="edit"><span class="fa fa-check-square-o"></span></a>
                      <a href="" class="btn btn-sm btn-danger" title="hapus"><span class="fa fa-trash-o"></span></a>
                  </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Poli</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

</div>
@endsection

@include('poli.add')
