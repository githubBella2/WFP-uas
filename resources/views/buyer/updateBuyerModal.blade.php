
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="POST" action="{{ route('buyer.update',$buyer->id)}}">
      <div class="modal-header">
        <h4 class="modal-title" style="text-align: center;margin-left:33%;">Ubah Buyer</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            @csrf
            @method("PUT")
            <div class="form-group">
                <label class="small mb-1" for="InputKategoriUpdate">Nama Buyer</label>
                 <input name="name" class="form-control" id="InputKategoriUpdate" type="text" placeholder="Enter Buyer" value="{{ $buyer->name }}">
            </div>
            <div class="form-group">
                <label class="small mb-1" for="InputEmail">Email Buyer</label>
                 <input name="email" class="form-control" id="InputEmail" type="text" placeholder="Enter Email" value="{{ $buyer->email }}">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="insert"  id="insert" value="Update Buyer" class="btn btn-success" style="background-color:#2A1F41 ;" />
      </div>
    </form>
    </div>
</div>