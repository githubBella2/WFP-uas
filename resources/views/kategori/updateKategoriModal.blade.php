
<div class="modal-dialog" role="document">
    <div class="modal-content">
        {{-- <form method="POST" action="{{ route('categories.update',$kategori->id ) }}"> --}}
      <div class="modal-header">
        <h4 class="modal-title" style="text-align: center;margin-left:33%;">Ubah Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            @csrf
            @method("PUT")
            <div class="form-group">
                <label class="small mb-1" for="InputKategoriUpdate">Nama Kategori</label>
                 <input name="nama" class="form-control" id="InputKategoriUpdate" type="text" placeholder="Enter Kategori" value="{{ $kategori->nama }}">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="insert" data-dismiss="modal" onclick="saveData({{ $kategori->id }})" id="insert" value="Update Kategori" class="btn btn-success" style="background-color:#2A1F41 ;" />
      </div>
    {{-- </form> --}}
    </div>
</div>