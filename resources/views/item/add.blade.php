<!-- Modal -->
<div class="modal fade" id="addPoli" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Tambah Item</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                         <select name="kategori" id="kategori" class="form-control">
                            <option value="jenis kelamin">jenis kelamin</option>
                            <option value="golongan darah">Golongan darah</option>
                            <option value="Agama">Agama</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="item">Item</label>
                        <input type="text" class="form-control" id="item" placeholder="nama item" name="item">
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
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>

    </div>
</div>
</div>
