@extends('tamplate')


@section('kontens')
    <h1 class="mt-4">User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
        <li class="breadcrumb-item active">Daftar Buyer</li>
    </ol>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> This alert box could indicate a successful or positive action.
        </div>
    @endif

    <div class="modal" id="myModal_Update" tabindex="-1">


    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right">
                <input type="submit" onclick="tambahData()" value="Tambah Produk" class="btn btn-primary btn-sm"
                    id="InputKategori" data-toggle="modal" data-target="#add_data_Modal">
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <div id="add_data_Modal" class="modal fade">
        <div class="modal-dialog" style="width: 100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center;margin-left:33%;">Tambah Supplier</h4>
                </div>
                <div class="modal-body" style="margin-top: 10px;">

                    <form method="POST" action="{{ route('supplier.store') }}">
                        @csrf
                        <div class="form-group">
                            <label class="small mb-1" for="InputSupplier">Nama Supplier</label>
                            <input name="name" class="form-control" id="InputSupplier" type="text"
                                placeholder="Enter Supplier">
                        </div>

                </div>

                <!-- FOOTER -->
                <div class="modal-footer">
                    <input type="submit" name="insert" id="insert" value="Tambah Supplier" class="btn btn-success"
                        style="background-color:#2A1F41 ;" />
                    <button type="button" class="btn btn-default" data-dismiss="modal"
                        style="background-color:#E5E5E5;">Batal</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- END MODAL --}}


    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        {{-- <th>Member Status</th> --}}
                        <th>Tanggal Di Tambahkan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        {{-- <th>Member Status</th> --}}
                        <th>Tanggal Di Tambahkan</th>
                        <th>Action</th>

                    </tr>
                </tfoot>
                <tbody>
                    <?php $urutan = 0; ?>
                    @foreach ($data as $by)
                        <?php $urutan += 1; ?>
                        <tr>
                            <td> {{ $urutan }}</td>
                            <td>{{ $by->nama }}</td>
                            {{-- <td>{{ $by->member->status }}</td> --}}
                            <td>{{ $by->created_at }}</td>
                            <td> <a href="#myModal_Update" class="btn btn-primary" data-toggle="modal"
                                    onclick="getUpdate({{ $by->id }})">Edit</a>

                                @if (auth()->user()->roles_id == 4)
                                    <form action="{{ route('supplier.destroy', $by->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <input type="submit" value="delete" class="btn btn-danger"
                                            onclick="if(!confirm('are you sure to delete this ??')) return false">

                                    </form>
                                @endif


                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="modal" id="myModal_" tabindex="-1">

            </div>

        </div>
    @endsection

    @section('javascript')
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function getUpdate(id) {
                $.ajax({

                    type: 'GET',
                    url: '{{ route('supplier.edit', 'id') }}',
                    data: {
                        id
                    },
                    success: function(data) {

                        $("#myModal_Update").html(data.msg);
                        console.log(data);

                    }
                });
            }
        </script>
    @endsection
