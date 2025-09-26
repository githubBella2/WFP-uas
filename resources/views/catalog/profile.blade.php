@extends('tamplate')

@section('kontens')
    <h1 class="mt-4">Profile</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
        <li class="breadcrumb-item active">Profile</li>
    </ol>

    {{-- <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
        <div class="card p-4">
            <div class=" image d-flex flex-column justify-content-center align-items-center"> <button
                    class="btn btn-secondary"> <img src="https://i.imgur.com/wvxPV9S.png" height="100"
                        width="100" /></button> <span class="name mt-3">{{ $data->name }}</span> <span
                    class="idd">{{ $data->email }}</span>

                <div class="d-flex flex-row justify-content-center align-items-center mt-3"> <span class="number"><span
                            class="follow">Point</span></span> </div>

                <div class=" d-flex mt-2"></div>
                
                
                <div class="d-flex flex-row justify-content-center align-items-center mt-3"> <span class="number"><span
                            class="follow">Member Cart</span></span> </div> --}}

    {{-- PENGECEKAN CARD MEMBER --}}
    {{-- @if (auth()->user()->members_id == 1)
                    <div class=" d-flex mt-2"> <button class="btn btn-primary">{{ $data->member->status }}</button> </div>
                @elseif(auth()->user()->members_id == 2)
                    <div class=" d-flex mt-2"> <button class="btn btn-warning">{{ $data->member->status }}</button> </div>
                @else
                    <div class=" d-flex mt-2"> <button class="btn btn-secondary">{{ $data->member->status }}</button> </div>
                @endif




                <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> <span><i
                            class="fa fa-twitter"></i></span> <span><i class="fa fa-facebook-f"></i></span> <span><i
                            class="fa fa-instagram"></i></span> <span><i class="fa fa-linkedin"></i></span> </div>
                <div class=" px-2 rounded mt-4 date "> <span class="join">Joined {{ $data->created_at }}</span> </div>
            </div>
        </div>
    </div> --}}

    <div class="container mt-5">

        <div class="row d-flex justify-content-center">

            <div class="col-md-7">

                <div class="card p-3 py-4">

                    <div class="text-center">
                        <img src="https://i.imgur.com/bDLhJiP.jpg" width="100" class="rounded-circle">
                    </div>

                    <div class="text-center mt-3">
                        {{-- <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span> --}}

                        @if (auth()->user()->members_id == 1)
                            <span class="bg-primary p-1 px-4 rounded text-white">{{ $data->member->status }}</span>
                        @elseif(auth()->user()->members_id == 2)
                            <span class="bg-warning p-1 px-4 rounded text-white">{{ $data->member->status }}</span>
                        @else
                            <span class="bg-secondary p-1 px-4 rounded text-white">{{ $data->member->status }}</span>
                        @endif


                        <h5 class="mt-2 mb-0">{{ $data->name }}</h5>
                        <span>{{ $data->email }}</span>

                        <div class="px-4 mt-1 mb-5">
                            {{-- <p class="">Point</p> --}}
                            <span>Point</span>



                            @if (auth()->user()->members_id == 1)
                                @if (auth()->user()->cart_member_id != null)
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $cm->point }}%;"
                                            aria-valuenow="{{ $cm->point }}" aria-valuemin="0" aria-valuemax="100">
                                            {{ $cm->point }}</div>
                                    </div>
                                @else
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                                            aria-valuemin="0" aria-valuemax="100">
                                            0</div>
                                    </div>
                                @endif
                            @else
                                @if (auth()->user()->cart_member_id != null)
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{ $cm->point - 50 }}%;" aria-valuenow="{{ $cm->point }}"
                                            aria-valuemin="0" aria-valuemax="100">
                                            {{ $cm->point }}</div>
                                    </div>
                                @else
                                    
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                                            aria-valuemin="0" aria-valuemax="100">
                                            0</div>
                                    </div>
                                    
                                @endif
                            @endif

                        </div>



                        <div class="buttons">

                            <button class="btn btn-outline-primary px-4">Message</button>
                            <button class="btn btn-primary px-4 ms-3">Contact</button>
                        </div>


                    </div>




                </div>

            </div>

        </div>

    </div>
@endsection
