@extends('tamplate')

@section('kontens')



<div class="container products">

    <div class="row">

        @foreach ($data as $productData)
            <div class="col-xs-18 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="http://placehold.it/500x300" alt="">
                    <div class="caption">
                        <img src="gambar/{{ $productData->img }}" alt="" style="width: 200px">
                        <h4>{{ $productData->nama }}</h4>
                        <p style="height: 100px">{{ $productData->description }}</p>
                        <p><strong>Price: </strong> {{$hasil_rupiah = "Rp " . number_format($productData->harga,2,',','.') }}</p>
                        <p class="btn-holder"><a onclick="addToCart({{ $productData->id }})" class="btn btn-warning btn-block text-center"
                                role="button">Add to cart</a> </p>
                    </div>
                </div>
            </div>
        @endforeach


    </div><!-- End row -->

</div>

@endsection

@section('javascript')

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function addToCart(id)  {
      $.ajax({
          type:'POST',
          url:'{{route("addToCart")}}',
          data:{id},
          success:function(data)  {

            location.reload();

              alert("Berhasil Di tambahkan ke card");
          }
        });
    }


</script>
@endsection


