<!-- Modal -->
<div class="modal fade" id="addPoli" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Tambah Poli</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Kode</label>
                        <input type="text" class="form-control" id="kode" placeholder="kode poli" name="kode" readonly value="">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Poli</label>
                        <input type="text" class="form-control" id="poli" placeholder="nama poli" name="poli">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Tanggal aktif</label>
                        <input type="text" class="form-control" id="poli" placeholder="nama poli" name="poli">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">aktif</option>
                            <option value="0">tidak aktif</option>
                        </select>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>

    </div>
</div>
</div>
