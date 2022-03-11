@extends((session('account')=='Caissier') ? 'layouts.layout_two' : 'layouts.layout_users')
@section('titre') Verification des vos transactions @stop
@section('contenu')
    <div class="card adC ">
        <div class="row w-100">
            <div class="col-md-8">
                <div class="card-header">
                <img src="{{url('assets/img/default_user.png')}}" alt='profil' width='40' height='40' class='rounded-circle'>
                <span>{{ $dest_name }}</span>
                </div >
                <div class="card-body position-relative">
                    <div class="overflow-auto p-0"style="height: 21rem;">
                    @php
                        $validator=0;
                        if(count($message)) $validator=0;
                        else $validator=1;
                    @endphp
                    @if($validator)
                            <div class="text-white adC card rounded text-break ps-2 pe-2 pt-2 pb-2 d-flex">
                                            Les messages sont chiffres par un algorithme propre a nuru_banque. Aucun autre tiers 
                                            ne peut les lire. Commencer une discussion avec les autres sans les importunes svp.
                                            En cas de probleme, contactez-nous 24/24!
                            </div>
                    @endif
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
                   <div class="w-100">
                        <form action="/send_message" method="post">
                        @csrf
                            <div class="row w-100">
                                <div class="col-10">
                                <textarea name="message" id="" rows="" class="form-control "></textarea>
                                </div>
                                <div class="col-2"><button type="submit" class="btn btn-success">Envoyer</button></div>
                            </div>
                        </form>
                   </div>
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