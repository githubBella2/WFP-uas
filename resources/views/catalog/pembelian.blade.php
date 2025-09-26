@extends('tamplate')

@section('kontens')
<h1 class="mt-4">Pembelian</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
    <li class="breadcrumb-item active">Pembelian</li>
</ol>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    {{-- <th>Pembeli</th> --}}
                    <th>Pembeli</th>
                    <th>Tanggal Transaction</th>
                    <th>Action</th>


                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    {{-- <th>Pembeli</th> --}}
                    <th>Pembeli</th>
                    <th>Tanggal Transaction</th>
                    <th>Action</th>


                </tr>
            </tfoot>
            <tbody>
                <?php $urutan = 0; ?>
                @foreach ($data as $td)
                <?php $urutan += 1 ; ?>
                <tr>
                    <td>{{$urutan}}</td>
                    <td>{{$td->User->name}}</td>
                    <td>{{$td->created_at}}</td>
                    <td><a class="btnbtn-default" data-toggle="modal" href="#myModal_"
                    onclick="getDetailData({{$td->id}});">LihatRincianPembelian</a></td>
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

    function getDetailData(id)  {
      $.ajax({
          type:'POST',
          url:'{{route("dash.showInfo")}}',
          data:{id},
          success:function(data)  {

              $("#myModal_").html(data.msg);
          }
        });
    }

    function tambahData(){
        alert("Ceritanya Tambah data");
    }

</script>
@endsection