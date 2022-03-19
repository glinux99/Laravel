@extends('layouts.layout_two')
@section('titre') {{__("Ajouter un agent")}} @endsection
@section('contenu')
<!-- A enlever lors du deployement -->
    @php
    $admin = 0;
    $caissier = 0;
    if(session('account')=='Admins') $admin =1;
    else if(session('account')==='Caissier') $caissier =1;
    else {
        $admin = 0;
        $caissier = 0;
    }
    $matricule = substr(str_shuffle("1234567890"), 0, 12);
     $matricule2 = substr(str_shuffle("1234567890"),0,2);
    $matricule = "4970".$matricule.$matricule2;
    @endphp
    <form action="{{ url('add_agent_submit')}}" method="post">
    @csrf
        <div class="row mx-auto">
            <div class="col-lg-9 card adC ">
                <div class="card-header text-success text-center">
                    {{ __("Création du compte ")}} @if($admin) {{ __("pour Agent")}} @else {{ __("pour Client")}} @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="nomB" >
                                {{ __("Nom")}}
                            </label>
                            <input type="text" name="nom" id="" class="form-control" placeholder="votre nom" value="" >
                        </div>
                        <div class="col-lg-4">
                            <label for="nomB" >
                                {{ __("Prenom")}}
                            </label>
                            <input type="text" name="prenom" id="" class="form-control" placeholder="votre prenom" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="nomB" >
                                {{ __("Adresse e-mail")}}
                            </label>
                            <input type="mail" name="mail" id="" class="form-control" placeholder="nurubanque@gmail.com" value="">
                        </div>                    
                    </div>
                    <div class="row">
                    <div class="col-lg-4">
                        <label for="nomB" >{{ __("Matricule Client")}}</label>
                        <input type="text" name="" id="" class="form-control" placeholder="matricule" disabled value="{{$matricule}}">
                        <input type="text" name="matricule" id="" class="form-control" placeholder="matricule" value="{{$matricule}}" hidden>
                    </div>
                    <div class="col-lg-4">
                        <label for="nomB" >{{ __("Password")}}</label>
                        <input type="text" name="psswd" id="" class="form-control" placeholder="password" value="">
                    </div>
                    <div class="col-lg-4">
                        <label for="nomB" >{{ __("Numero Tel:")}} </label>
                        <input type="mail" name="numero_tel" id="" class="form-control" placeholder="+243970912428" value="">
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="nomB" >{{ __("Type de Compte")}}</label>
                            <select name="type_compte" id="" class="form-control">
                                @if($caissier)
                                    <option value="">--{{ __("Select Categorie client")}}--</option>
                                    <option value="Particulier">{{ __("Particulier")}}</option>
                                    <option value="Actionnaire">{{ __("Actionnaire / Investisseur")}}</option>
                                    <option value="Emploi">{{ __("Candidat à l'emploi")}}</option>
                                    <option value="PME">{{ __("PME")}}</option>
                                    <option value="Entreprise">{{ __("Entreprise")}}</option>
                                @elseif($admin)
                                    <option value="">--{{ __("Select Categorie Agent")}}--</option>
                                    <option value="Caissier">{{ __("Caissier")}}</option>
                                    <option value="Informaticien">{{ __("Informaticien")}}</option>
                                    <option value="Securite">{{ __("Securite")}}</option>
                                    <option value="autres">{{ __("Autres")}}</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="nomB" >Genre</label>
                            <select name="genre" id="" class="form-control">
                                <option value="">--{{ __("Select Genre")}}--</option>
                                <option value="F">{{ __("Féminin")}}</option>
                                <option value="M">{{ __("Masculin")}}</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="nomB" >Prendre une photo </label>
                            <input type="text" name="photo" id="" hidden>
                            <input type="button" class="form-control" value="<?php echo "Capture";?>" data-toggle="modal" data-target="#photo">
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="nomB" >{{ __("Adresse")}}</label>
                                <input type="text" name="quart_av" id="" class="form-control" placeholder="Goma, 22 Box Dego" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="nomB"  >{{ __("Ville")}}</label>
                                <input type="text" name="ville" id="" class="form-control" placeholder="Goma" value="">
                            </div>
                            <div class="col-lg-4">
                                <label for="nomB" >{{ __("Province")}}</label>
                                <input type="text" name="province" id="" class="form-control" placeholder="Nord-Kivu" value="">
                            </div>
                            <div class="col-lg-4">
                                <label for="nomB" >{{ __("Pays")}}</label>
                                <input type="mail" name="pays" id="" class="form-control" placeholder="RDC" disabled value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="apropos">{{ __("À propos du Caissier")}}:</label>
                                <textarea name="apropos" placeholder="À propos de moi" class="form-control"> </textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark  mt-2 mb-lg-2 col-lg-3">{{ __("Ajouter Agent")}}</button>
                        </div>
                    </div>
                </div>
            <div class="col-lg-3 align-self-center text-center">
                <p class="card-header">{{ __("Photo par défaut du client")}}</p>
                <img src="{{url('assets/img/default_user.png')}}" alt="user-default-profil" id="img" class="adC card-img-top rounded-circle" width="80%" height="80%">
            </div>
        </div>
    </form>
@stop
