@extends((session('account')=='Caissier') ? 'layouts.layout_two' : 'layouts.layout_users')
@section('titre') Verification des vos transactions @stop
@section('contenu')
    <div class="card adC ">
        <div class="row w-100">
            <div class="col-md-8">
                <div class="card-header">
                <img src="{{url('assets/img/default_user.png')}}" alt='profil' width='40' height='40' class='rounded-circle'>
                <span>{{ $dest_name }}</span>
                </div>
                <div class="card-body">
                    @foreach($message as $items)
                        @if(($items->source_id)===session('data')->matricule)
                            <div class="text-white table-card rounded ms-4 text-break ps-2 pe-2 pt-2 pb-2 d-flex" >
                            <img src="{{url('assets/img/default_user.png')}}" alt='profil' width='40' height='40' class='rounded-circle'>
                            <span>mmmm
                            <br><small class="text-muted float-right pt-2"><i>date</i></small></span>
                            </div>
                        @else
                        <div class="d-flex text-white justify-content-end table-card rounded ms-4 text-break ps-2 pe-2 pt-2 pb-2 " >
                        <span>kkkkkk</span><img src="{{url('assets/img/default_user.png')}}" alt='profil' width='40' height='40' class='rounded-circle'>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-header">
                    Chat Live
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach($data as $items)
                            <a href="/message/{{$items->matricule}}" class="nav-link p-0 m-0">
                                <div class="list-group-item adC text-white">
                                    <img src="{{url('assets/img/default_user.png')}}" alt='profil' width='40' height='40' class='rounded-circle'><span>{{ $items->nom.' '.$items->prenom}}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop