@extends('layouts.layout_users')
@section('contenu')
    <div class="col-lg-11 mx-auto card adC2">
    <img src="{{url('assets/img/default_user.png')}}" alt="user-default-profil" id="img" class="align-self-center adC rounded-circle" width="20%" height="50%">
        <div class="row mx-auto p-0">
            <div class="col-lg-6 card adC">
                <div class="w-100">
                    <div class="card-header text-success">
                        {{ __("Information basique") }}
                    </div>
                    <div class="card-body px-0">
                        <div class="list-group">
                            @php $x = ['Noms'=>$data['nom'].' '.$data['prenom'],'Email'=>$data['adresse_mail'],'Nuru Banque ID'=>$data['matricule'], 'Password'=>'******************************'];
                            @endphp
                            @foreach ($x as $item => $val)
                                <div class="list-group-item d-flex adC">
                                    <div class="col-5 text-white">
                                        {{$item}}
                                    </div>
                                    <div class="col-7 text-muted">
                                        {{ $val }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="w-100">
                    <div class="card-header text-success">
                        {{ __("Parametre du Compte") }}
                    </div>
                    <div class="card-body px-0">
                        <div class="list-group">
                            <div class="list-group-item d-flex adC">
                                <div class="col-5 text-white">
                                    {{ __("Langage") }}
                                </div>
                                <div class="col-7 text-muted">
                                    {{ __("Francais") }}
                                </div>
                            </div>
                            <div class="list-group-item d-flex adC">
                                <div class="col-5 text-white">
                                    {{ __("Parametres de confidentialite") }}
                                </div>
                                <div class="col-7 text-muted">
                                    {{ __("Seuls les administrateurs et les agents de la banque
                                     peuvent avoir acces a vos donnees pour mieux proteger votre compte") }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-0 adC align-self-center">
                <div class="card-header text-success">
                    {{ __("Information Supplementaire") }}
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @php $x = ['Genre'=>$data['genre'],'Numero Tel'=>$data['numero_tel'],'Type de Compte'=>$data['type_compte'], 'Adresse'=>$data['quart_av'],'Ville'=>$data['ville'], 'Province'=>$data['province'], 'Pays'=>$data['province'],'A propos'=>$data['apropos']];
                        @endphp
                        @foreach ($x as $item => $val)
                            <div class="list-group-item d-flex adC">
                                <div class="col-5 text-white">
                                    {{$item}}
                                </div>
                                <div class="col-7 text-muted">
                                    {{ $val }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop