@extends('tamplate')


@section('kontens')
<h1 class="mt-4">Produk</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
    <li class="breadcrumb-item active">Daftar Kategori</li>
</ol>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Berhasil menambahkan data
        </div>
    @endif

    @if (session('ubah'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> Berhasil edit data
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

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama </th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Nama </th>
                        <th>Action</th>

                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $kategori)
                        <tr id="tr_{{ $kategori->id }}">
                            <td id="kt_id_{{ $kategori->id }}">{{ $kategori->id }}</td>
                            <td id="kt_nama_{{ $kategori->id }}">{{ $kategori->nama }}</td>
                            <td>
                                <a href="#myModal_Update" class="btn btn-primary" data-toggle="modal"
                                    onclick="getUpdate({{ $kategori->id }})">Edit</a>

                                {{-- <form action="{{ route('categories.destroy', $kategori->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" value="delete" class="btn btn-danger"
                                        onclick="if(!confirm('are you sure to delete this ??')) return false">
                                </form> --}}

                                <input type="submit" value="delete" class="btn btn-danger"
                                    onclick="delete2({{ $kategori->id }})">
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        {{-- MODAL --}}
        <div id="add_data_Modal" class="modal fade">
            <div class="modal-dialog" style="width: 100%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="text-align: center;margin-left:33%;">Tambah Kategori</h4>
                    </div>
                    <div class="modal-body" style="margin-top: 10px;">

                        <form method="POST" action="{{ route('kategori.store') }}">
                            @csrf
                            <div class="form-group">
                                <label class="small mb-1" for="InputKategori">Nama Kategori</label>
                                <input name="nama" class="form-control" id="InputKategori" type="text"
                                    placeholder="Enter Kategori">
                            </div>

                    </div>

                    <!-- FOOTER -->
                    <div class="modal-footer">
                        <input type="submit" name="insert" id="insert" value="Tambah Kategori" class="btn btn-success"
                            style="background-color:#2A1F41 ;" />
                        <button type="button" class="btn btn-default" data-dismiss="modal"
                            style="background-color:#E5E5E5;">Batal</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- END MODAL --}}

        <script>
            function getUpdate(id) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({

                    type: 'GET',
                    url: '{{ route('kategori.edit', 'id') }}',
                    data: {
                        id
                    },
                    success: function(data) {

                        $("#myModal_Update").html(data.msg);
                        console.log(data);

                    }
                });
            }

            function saveData(id) {
                var knama = $('#InputKategoriUpdate').val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('update_save') }}',
                    data: {
                        'id': id,
                        'nama': knama
                    },
                    success: function(data) {

                        if (data.status == 'ok') {
                            // alert("ok");
                            $('#kt_id_' + id).html(id);
                            $('#kt_nama_' + id).html(knama);
                        }

                    }
                });
            }

            function delete2(id) {

                if (confirm("Yakin ?? Masa mau di hapus sih :(((((") == true) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('delete_data_2') }}',
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            'id': id
                        },
                        success: function(data) {
                            if (data.status == 'ok') {
                                console.log(data);
                                $('#tr_' + id).remove();
                            }
                        }
                    });

                } else {
                    text = "You canceled!";
                }


            }
        </script>
    @endsection
