
      {{-- MODEL --}}

                <!-- The Modal -->
                
                <div class="modal-dialog">
                    <div class="modal-content">                    
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Detail</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      
                      <!-- Modal body -->
                      <div class="modal-body">
                         <p>ID Transaksi :  {{ $tr->id }}</p>
                          <p>Tanggal Transaksi :  {{ $tr->created_at }}</p> 
                          <p>Nama Pembeli : {{ $tr->user->name }}</p>

                          <table class="table table-bordered" width="100%" cellspacing="0">
                            <tr>
                              <th>Produk</th>
                              <th>Kategori</th>
                              <th>Quantity</th>
                              <th>Price</th>
                              <th>Total</th>
                            </tr>
                          @foreach($md as $medicine)
                            <tr>
                              @foreach($pr as $pro)
                                @if($pro -> id == $medicine-> obats_id)
                                <td>{{ $pro->nama }}</td>
                                <td>{{ $pro->kategori->nama}}</td>
                                    
                                @endif
                            @endforeach
                            <td>{{ $medicine->jumlah }}</td>
                            <td>{{ $medicine->harga }}</td>
                            <td>{{ $medicine->harga * $medicine->jumlah }}</td>
                            </tr>
                          @endforeach
                        </table>

                      </div>
                      
                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              
      {{-- END MODEL --}}