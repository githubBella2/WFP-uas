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



    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Member Status</th>
                        <th>Tanggal Di Tambahkan</th>
                        @if (auth()->user()->roles_id == 4)
                            <th>Action</th>
                        @endif

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Member Status</th>
                        <th>Tanggal Di Tambahkan</th>
                        @if (auth()->user()->roles_id == 4)
                            <th>Action</th>
                        @endif


                    </tr>
                </tfoot>
                <tbody>
                    <?php $urutan = 0; ?>
                    @foreach ($data as $by)
                        <?php $urutan += 1; ?>
                        <tr>
                            <td> {{ $urutan }}</td>
                            <td>{{ $by->name }}</td>
                            <td>{{ $by->member->status }}</td>
                            <td>{{ $by->created_at }}</td>

                            @if (auth()->user()->roles_id == 4)
                                <td> <a href="#myModal_Update" class="btn btn-primary" data-toggle="modal"
                                        onclick="getUpdate({{ $by->id }})">Edit</a>

                                    <form action="{{ route('buyer.destroy', $by->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <input type="submit" value="delete" class="btn btn-danger"
                                            onclick="if(!confirm('are you sure to delete this ??')) return false">

                                    </form>
                                </td>
                            @endif



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
                    url: '{{ route('buyer.edit', 'id') }}',
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
