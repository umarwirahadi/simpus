<div class="modal fade" id="form-setpoli">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
          <form action="" id="formsetpoli">
              @csrf
            <div class="modal-header">
            <h4 class="modal-title">Ubah Poli</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <select class="custom-select form-control" name="poli" id="poli">
                    {!! KustomHelper::getPoli() !!}
                </select>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary btn-sm">Ubah</button>
            </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>