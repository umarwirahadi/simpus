{{-- @extends('layouts.main')
@section('content') --}}

<div class="modal fade" id="modalMd-obat-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalMdTitle">
                Edit Obat
                </h4>                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">                
                <div class="form-horizontal">
                    <form action="" method="POST" id="formeditobat" name="formeditobat">
                       @csrf
                       <input name="_method" type="hidden" value="PUT">
                           <div class="row">        
                             <div class="col-sm-4">
                               <div class="form-group">
                                 <label>Kode</label>
                                 <input type="hidden" name="edit_id_obat" id="edit_id_obat" value=""/>
                                 <input type="text" class="form-control form-control-sm text-uppercase" name="edit_kode" id="edit_kode" value="" />
                               </div>
                             </div>
                               <div class="col-sm-8">
                                   <div class="form-group">
                                     <label>Nama obat </label>
                                     <input type="text" class="form-control form-control-sm" name="edit_nama_obat" id="edit_nama_obat" value=""/>
                                   </div>
                                 </div>                                                  
                             </div>
                           <div class="row">                                    
                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label>Jenis</label>
                                       <select class="form-control form-control-sm" name="edit_jenis" id="edit_jenis" required>
                                         {!!KustomHelper::getItem('jenis-obat')!!}
                                       </select>
                                   </div>
                                 </div>
                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label>Satuan</label>
                                       <select class="form-control form-control-sm" name="edit_satuan" id="edit_satuan" required>
                                         {!!KustomHelper::getItem('satuan-obat')!!}
                                       </select>
                                   </div>
                                 </div>                                     
                             </div>
                           <div class="row">
                               <div class="col-sm-3">
                                   <div class="form-group">
                                     <label>Harga</label>
                                     <input type="text" class="form-control form-control-sm" name="edit_harga" id="edit_harga" value="" />
                                   </div>
                                 </div>                                             
                                 <div class="col-sm-3">
                                   <div class="form-group">
                                     <label>Stok awal</label>
                                     <input type="text" class="form-control form-control-sm" name="edit_stok_awal" id="edit_stok_awal" value="" readonly />
                                   </div>
                                 </div>
                                 <div class="col-sm-3">
                                   <div class="form-group">
                                     <label>Sisa stok</label>
                                     <input type="text" class="form-control form-control-sm" name="edit_sisa_stok" id="edit_sisa_stok" value="" readonly />
                                   </div>
                                 </div> 
                                 <div class="col-sm-3">
                                   <div class="form-group">
                                     <label>status</label>
                                     <select class="form-control form-control-sm" name="edit_status" id="edit_status" required>
                                       {!!KustomHelper::getItem('Status-aktif')!!}
                                     </select>
                                   </div>
                                 </div>                  
                             </div>
                           <div class="row">
                               <div class="col-sm-12">
                                   <div class="form-group">
                                     <label>Keterangan</label>
                                     <textarea name="edit_keterangan" id="edit_keterangan" class="form-control form-control-sm" cols="30" rows="2"></textarea>
                                   </div>
                                 </div>                                                           
                             </div>   
                             <div class="modal-footer justify-content-right">
                                 <button type="submit" class="btn btn-primary">Update</button>
                                 <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                               </div>
                           </form>
                           </div>
            </div>
        </div>
    </div>
</div>

 

        
{{-- @endsection --}}
