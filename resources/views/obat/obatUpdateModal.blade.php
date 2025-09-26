<form method="POST" action="{{ route('obat.update' , $pr->id)}}">
    <div class="modal-dialog">
        <div class="modal-content">                    
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Update Data</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
    
                @csrf
                @method("PUT")
                        <div class="form-group">
                            <label class="small mb-1" for="InputObat">Nama Obat</label>
                            <input value="{{ $pr->nama }}" name="nama" class="form-control" id="InputObat2" type="text" placeholder="Enter Obat">
                        </div>
    
                <div class="form-group">
                    <label class="small mb-1" for="inputForm">Form</label>
                    <input name="form" value="{{ $pr->form }}" class="form-control py-4" id="inputForm2" aria-describedby="emailHelp" placeholder="Enter Form">
                </div>
    
                <div class="form-group">
                    <label class="small mb-1" for="restriction">Restriction</label>
                    <input name="restriction" value="{{ $pr->restriction }}" class="form-control py-4" id="restriction2" aria-describedby="emailHelp" placeholder="Enter Restriction">
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="Description">Description</label>
                    <input name="description" value="{{ $pr->description }}" class="form-control py-4" id="Description2" aria-describedby="emailHelp" placeholder="Enter Description">
                </div>   
                <div class="form-group">
                    <label class="small mb-1" for="harga">Harga</label>
                    <input name="harga" value="{{ $pr->harga }}" class="form-control py-4" id="harga"
                        aria-describedby="emailHelp" placeholder="Enter Price">
                </div>

                 <div class="form-group">
                     <label class="small mb-1" for="kategori">Kategori</label>
                        <select class="form-control py-4" name="kategori" id="kategori2" style="width: 100%;">
                            @foreach($kt as $kategori)
                            <option value="{{ $kategori ->  id }}">{{ $kategori -> nama }}</option>
                            @endforeach
                        </select>
                </div>

                <div class="form-group">
                    <input type ="file" name="image" class="form-control py-4" id="image" multiple style="height:90px;">
                </div>
    
              </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <input type="submit" name="insert" id="insert" value="Update Produk" class="btn btn-success" style="background-color:#2A1F41 ;" />
            <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color:#E5E5E5;">Batal</button>
          </div>
      </div>
    </div>
    </form>
    
    <script>
              $(document).ready(function() {
              $("#kategori2").select2();
          });
    </script>