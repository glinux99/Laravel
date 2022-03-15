@extends('layouts.layout_one')
@section('titre')Bienvenu sur notre banque en ligne @endsection
@section('menu-second')
    <div class="col-lg-9 col-7 p-0 m-0 nav navbar-expand-lg">
        <button type="button" class="navbar-toggler p-2  my-auto" data-bs-toggle="collapse" data-bs-target=".men" style="max-height: 40px;">
            <span class="bi-plus"></span>
        </button>
        <div class="collapse navbar-collapse men">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a href="{{ Route('login')}}" class="nav-link text-white">{{ __("Mon compte")}}</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white ">{{ __("Mes payements")}}</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">{{ __("Mon epargne")}}</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">{{ __("Mes credits")}}</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">{{ __("intermediaire Financiers")}}</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">{{ __("Statistiques")}}</a>
                </li>
                <li class="nav-item">
                    <select  name="langue" id="langue" class="form-control text-success border-0" style="background: #1D264A!important;">
                        <option value="">Langue 🇫🇷🇬🇧&emsp;</option>
                        <option value="fr" >🇫🇷&emsp;Francais</option>
                        <option value="en">🇬🇧&emsp;Anglais</option>
                    </select>
                </li>
            </ul>
        </div>
    </div>
@endsection
@section('contenu-start')
<div class="w-100">
    <div class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="card carousel-item active">
                <img src="{{url('assets/img/banque_img.jpg')}}" alt="" class="card-img-top">
                <div class="card-img-overlay d-flex ">
                   <div class="mx-auto align-self-center pb-5 text-center">
                        <h3 class="text-uppercase text-warning" style="font-weight: 200; color: rgb(255, 102, 0)"><span style="color: rgb(39, 148, 29);"><span style="color: rgb(39, 148, 29);">{{  __("Nuru Banque") }}</span></span>{{  __(" avec plus d'avantages") }}
                        </h3>
                        <h6 class="text-white"style="font-weight: 100;">{{ __("Beneficiez de nombreux produits et services lie a votre compte")}}
                        </h6>
                        <div class="col-6 col-lg-4 mx-auto">
                            <a class="list-group-item text-warning" href="/login" >{{  __("Debuter avec nous") }}
                            </a>
                        </div>
                   </div>
                </div>
            </div>
            <div class="card carousel-item">
                <img src="{{url('assets/img/banque_img.jpg')}}" alt="" class="card-img-top">
                <div class="card-img-overlay d-flex ">
                   <div class="mx-auto align-self-center pb-5 text-center">
                        <h3 class="text-uppercase text-warning" style="font-weight: 200; color: rgb(255, 102, 0)"><span style="color: rgb(39, 148, 29);"><span style="color: rgb(39, 148, 29);">{{  __("Nuru Banque") }}</span></span>{{  __(" avec plus de facilite") }}
                        </h3>
                        <h6 class="text-white"style="font-weight: 100;">{{ __("Epargnez avec Nuru Merchant Bank et realisez vos projets avec facilite")}}
                        </h6>
                        <div class="col-6 col-lg-4 mx-auto">
                            <a class="list-group-item text-warning" href="/login" >{{  __("Debuter avec nous") }}
                            </a>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100 text-white px-3" style="background: #011720d3!important;">
        <div class="navbar navbar-dark d-flex justify-content-center">
            <div class=" d-flex flex-columns">
                {{  __("POUR UN ACCES RAPIDE, DITES-NOUS QUI VOUS ETES") }}
                <button class="navbar-toggler mx-4 " data-bs-toggle="collapse" data-bs-target=".coll2">
                    <span class="bi-chevron-down "></span><span class="bi-chevron-up"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse coll2">
                <ul class="nav nav-pills d-flex justify-content-center">
                    <a href="" class="nav-link">
                        <li class="nav-item">
                            <span class="bi-person-rolodex"></span><span>{{  __("Un particulier") }}</span>
                        </li>
                    </a>
                    <a href="" class="nav-link">
                        <li class="nav-item">
                            <span class="bi-people-fill"></span><span>{{  __("Actionnaire/Investisseur") }}</span>
                        </li>
                    </a>
                    <a href="" class="nav-link">
                        <li class="nav-item">
                            <span class="bi-person-workspace"></span><span>{{  __("Un candidat a l'emploi") }}</span>
                        </li>
                    </a>
                    <a href="" class="nav-link">
                        <li class="nav-item">
                            <span class="bi-person"></span><span>{{  __("Une PME") }}</span>
                        </li>
                    </a>
                    <a href="" class="nav-link">
                        <li class="nav-item">
                            <span class="bi-wallet-fill"></span><span>{{  __("Une entreprise") }}</span>
                        </li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="w-100">
            <div class="card-group">
                <div class="card">

                </div>
                <div class="card">
                    <div class="w-100">

                    </div>
                    <div class="w-100">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection

