@extends('tamplate')

@section('kontens')
<h1 class="mt-4">Produk</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
    <li class="breadcrumb-item active">Daftar Obat</li>
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

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right">
                <input type="submit" value="Tambah Produk" class="btn btn-primary btn-sm" id="tambah-data"
                    data-toggle="modal" data-target="#add_data_Modal">
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <div id="add_data_Modal" class="modal fade">
        <div class="modal-dialog" style="width: 100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: center;margin-left:33%;">Tambah Produk</h4>
                </div>
                <div class="modal-body" style="margin-top: 10px;">

                    <form method="POST" action="{{ route('obat.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="small mb-1" for="InputObat">Nama Obat</label>
                            <input name="nama" class="form-control" id="InputObat" type="text"
                                placeholder="Enter Obat">
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="inputForm">Form</label>
                            <input name="form" class="form-control py-4" id="inputForm" aria-describedby="emailHelp"
                                placeholder="Enter Form">
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="restriction">Restriction</label>
                            <input name="restriction" class="form-control py-4" id="restriction"
                                aria-describedby="emailHelp" placeholder="Enter Restriction">
                        </div>
                    
                        <div class="form-group">
                            <label class="small mb-1" for="kategori">kategori</label>
                            <select class="form-control py-4" name="kategori" id="kategori" style="width: 100%;">
                                @foreach ($kt as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                            
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="suppliers">suppliers</label>
                            <select class="form-control py-4" name="suppliers" id="suppliers" style="width: 100%;">
                                @foreach ($sup as $suppliers)
                                    <option value="{{ $suppliers->id }}">{{ $suppliers->nama }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        
                        <div class="form-group">
                            <input type ="file" name="image" class="form-control py-4" id="image" multiple style="height:90px;">
                        </div>

                        
                </div>

                <!-- FOOTER -->
                <div class="modal-footer">
                    <input type="submit" name="insert" id="insert" value="Tambah Produk" class="btn btn-success"
                        style="background-color:#2A1F41 ;" />
                    <button type="button" class="btn btn-default" data-dismiss="modal"
                        style="background-color:#E5E5E5;">Batal</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- END MODAL --}}


    {{-- Modal Update --}}

    <div class="modal" id="myModal_Update" tabindex="-1">

    </div>
    {{-- END Modal Update --}}

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama </th>
                        <th>Form</th>
                        <th>Restriction</th>
                        <th>image</th>
                        <th>Category</th>
                        <th>Action</th>
                        <th>Action2</th>
                        <th>Action3</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Nama </th>
                        <th>Form</th>
                        <th>Restriction</th>
                        <th>image</th>
                        <th>Category</th>
                        <th>Action</th>
                        <th>Action2</th>
                        <th>Action3</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $productData)
                        <tr>
                            <td id="td_id{{ $productData->id }}">{{ $productData->id }}</td>
                            <td id="td_nama{{ $productData->nama }}">{{ $productData->nama }}</td>
                            <td id="td_form{{ $productData->form }}">{{ $productData->form }}</td>
                            <td id="td_restriction{{ $productData->restriction }}">{{ $productData->restriction }}</td>
                            <td id="td_image{{ $productData->img }}"><img src="gambar/{{  $productData->img}}" alt="" height=100 width=100></img></td>
                            <td id="td_category_id{{ $productData->kategoris_id }}">{{ $productData->kategori->nama }}</td>
                            <td><a class="btn btn-primary" href="#myModal_{{ $productData->id }}"
                                    data-toggle="modal">show</a></td>

                            <td><a href="#myModal_Update" class="btn btn-primary" data-toggle="modal"
                                    onclick="getUpdate({{ $productData->id }})">Edit</a></td>

                            <td><a href="{{ route('obat.destroy', $productData->id) }}"></a>

                                <form action="{{ route('obat.destroy', $productData->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" value="delete" class="btn btn-danger"
                                        onclick="if(!confirm('are you sure to delete this ??')) return false">

                                </form>
                            </td>

                            {{-- MODEL --}}

                            <!-- The Modal -->
                            <div class="modal" id="myModal_{{ $productData->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{ $productData->nama }}</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <p>Nama Obat : {{ $productData->nama }}</p>
                                            <p>Form :{{ $productData->form }}</p>
                                            <p>Restriction : {{ $productData->restriction }}</p>
                                            <p>image : <img src="gambar/{{$productData->img }}" alt=""></p>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
        </div>
        {{-- END MODEL --}}
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $("#kategori").select2();
            $("#kategori2").select2();
            $("#suppliers").select2();
        });

        function getUpdate(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({

                type: 'GET',
                url: '{{ route('obat.edit' , 'id') }}',
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

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
