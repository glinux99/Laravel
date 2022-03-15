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
                    <a href="#" class="nav-link text-white ">{{ __("Taux d'echange")}}</a>
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
                <img src="{{url('assets/img/fr4.jpg')}}" alt="" class="card-img-top">
                <div class="card-img-overlay d-flex ">
                   <div class="mx-auto align-self-center pb-5 text-center">
                        <h3 class="text-uppercase fw-bold text-warning" style="font-weight: 200; color: rgb(255, 102, 0)"><span style="color: rgb(39, 148, 29);"><span style="color: rgb(39, 148, 29);">{{  __("Nuru Banque") }}</span></span>{{  __(" avec plus d'avantages") }}
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
                <img src="{{url('assets/img/fr5.png')}}" alt="" class="card-img-top w-50 mx-auto d-block" style="transform: scale(2);">
                <div class="card-img-overlay d-flex pb-5">
                   <div class="mx-auto align-self-center  text-center">
                        <h3 class="text-uppercase fw-bold text-warning " ><span style="color: rgb(39, 148, 29);">{{  __("Nuru Banque") }}</span>{{  __(" avec plus de facilite") }}
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
    <div class="w-100">
        <div class="card-header text-center">
            {{ __("TAUX D'ECHANGE")}}
        </div>
        @php
            $taux = array (
                    array(
                    "unite"=>1,
                    "code"=>"AOA",
                    "libele"=>"KWANZA ANGOLAIS",
                    "cours_a"=>3.7576,
                    "cours_m"=>3.8342,
                    "cours_v"=>3.9109
                    ),
                    array(
                    "unite"=>1,
                    "code"=>"BIF",
                    "libele"=>"FRANC BURUNDAIS",
                    "cours_a"=>0.9789,
                    "cours_m"=>0.9989,
                    "cours_v"=>1.0188
                    ),
                    array(
                    "unite"=>1,
                    "code"=>"CNY",
                    "libele"=>"YUAN CHINOIS",
                    "cours_a"=>309.3899,
                    "cours_m"=>315.7040,
                    "cours_v"=>322.0180
                    ),
                    array(
                    "unite"=>1,
                    "code"=>"JPY",
                    "libele"=>"YEN JAPONAIS",
                    "cours_a"=>17.0727,
                    "cours_m"=>17.4212,
                    "cours_v"=>17.7696
                    ),
                    array(
                    "unite"=>1,
                    "code"=>"RWF",
                    "libele"=>"FRANC RWANDAIS",
                    "cours_a"=>1.8860,
                    "cours_m"=>1.9245,
                    "cours_v"=>1.9630
                    ),
                    array(
                    "unite"=>1,
                    "code"=>"TZS",
                    "libele"=>"SHILLING TANZANIEN",
                    "cours_a"=>0.8472,
                    "cours_m"=>0.8645,
                    "cours_v"=>0.8817
                    ),
                    array(
                    "unite"=>1,
                    "code"=>"UGX",
                    "libele"=>"SHILLING OUGANDAIS",
                    "cours_a"=>0.5577,
                    "cours_m"=>0.5691,
                    "cours_v"=>0.5805
                    ),
                    array(
                    "unite"=>1,
                    "code"=>"USD",
                    "libele"=>"DOLLAR AMERICAIN",
                    "cours_a"=>1960.1392,
                    "cours_m"=>2000.1420,
                    "cours_v"=>2040.1449
                    ),
                    array(
                    "unite"=>1,
                    "code"=>"ZMW",
                    "libele"=>"KWACHA ZAMBIEN",
                    "cours_a"=>111.3718,
                    "cours_m"=>113.6447,
                    "cours_v"=>115.9175
                    ),
                    array(
                    "unite"=>1,
                    "code"=>"EUR",
                    "libele"=>"EURO",
                    "cours_a"=>22223.9894,
                    "cours_m"=>2269.3770,
                    "cours_v"=>2314.7645
                    ),
                    array(
                    "unite"=>1,
                    "code"=>"XAF",
                    "libele"=>"FRANC CFA",
                    "cours_a"=>3.3905,
                    "cours_m"=>3.4596,
                    "cours_v"=>3.5288
                    ),
                    array(
                    "unite"=>1,
                    "code"=>"ZAR",
                    "libele"=>"RAND SUD AFRICAIN",
                    "cours_a"=>129.3587,
                    "cours_m"=>131.9987,
                    "cours_v"=>134.6387
                    ),
                    array(
                    "unite"=>1,
                    "code"=>"AUD",
                    "libele"=>"DOLLAR AUSTRALIEN",
                    "cours_a"=>1413.7104,
                    "cours_m"=>1442.5616,
                    "cours_v"=>147.4129
                    ),
                    array(
                    "unite"=>1,
                    "code"=>"CAD",
                    "libele"=>"DOLLAR CANADIEN",
                    "cours_a"=>1528.2164,
                    "cours_m"=>1569.6089,
                    "cours_v"=>1601.0008
                    ),
                    array(
                    "unite"=>1,
                    "code"=>"CHF",
                    "libele"=>"FRANC SUISSE",
                    "cours_a"=>2141.8313,
                    "cours_m"=>2185.5421,
                    "cours_v"=>2229.2529
                    ),
                    array(
                    "unite"=>1,
                    "code"=>"GBP",
                    "libele"=>"LIVRE STERLING",
                    "cours_a"=>2668.0016,
                    "cours_m"=>2722.4506,
                    "cours_v"=>27776.8996
                    ),
                    array(
                    "unite"=>1,
                    "code"=>"XDR",
                    "libele"=>"D.T.S",
                    "cours_a"=>2748.7620,
                    "cours_m"=>2804.8592,
                    "cours_v"=>2860.9563
                    )







            );
        @endphp
        <div class="card-body">
            <div class="row">
                <div class="col-lg-7 card overflow-auto"style="clip-path: polygon(100% 0, 100% 46%, 93% 50%, 100% 54%, 100% 100%, 0 100%, 0% 80%, 0 0);">
                <p>
                  <div class="row " style="background: #0f222b!important;">
                      <div class="col-1">
                      <span class="bi-calendar bi--4xl"></span>
                      </div>
                      <div class="col-11 row text-white" style="background: #0f222b!important;">
                        <div class="col-7 d-flex flex-column p-0 m-0">
                            <span class="h3 p-0 m-0"> {{ __("Cours d'echange actuel") }}</span>
                            <small>{{ \Carbon\Carbon::now()->toDateString() }}</small>
                        </div>
                        <div class="col-5">
                            {{ __("1 USD = 2000.1420 CDF") }} <br> {{ __("cours moyen") }}
                        </div>
                      </div>
                  </div>
                </p>    
                <table style="background: #0f222b!important;" class="table table-bordered text-primary table-hover text-center table-striped">
                        <thead>
                            <tr>
                                <td>{{ __("Unite") }}</td>
                                <td>{{ __("code") }}</td>
                                <td> {{ __("libele") }}</td>
                                <td> {{ __("Cours acheteur") }}</td>
                                <td> {{ __("Cours moyen ") }}</td>
                                <td> {{ __("Cours vendeur ") }}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($taux as $items)
                                <tr>
                                @foreach($items as $item)
                                <td>{{ $item}}</td>
                                @endforeach
                                </tr>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-5 card mx-auto p-2">
                    <div class="row">
                        <div class="col-4">
                            <label for="">{{ __("Montant") }} </label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-4">
                            <label for="">De</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-4">
                            <label for="">A</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <a href="http://" class="text-center"><span class="text-center bi-caret-down bi--5xl"></span></a>
                    <p class="result " style="height: 50px;background: #0f222b!important;"></p>
                    <div>
                    <!doctype html><html lang="en" prefix="og: http://ogp.me/ns#"><head><meta charset="UTF-8"/><meta name="viewport" content="width=device-width,initial-scale=1"/><meta http-equiv="X-UA-Compatible" content="ie=edge"/><base target="_blank"/><title>Webpack App</title><link href="/assets/css/main.0cd3731fe7db71dd4667.css" rel="stylesheet"/></head><body><script>var _paq = (window._paq = window._paq || [])
      /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
      _paq.push(['trackPageView'])
      _paq.push(['disableCookies'])
      _paq.push(['enableLinkTracking'])
      ;(function () {
        var u = '//paw.in.devexperts.com/'
        _paq.push(['setTrackerUrl', u + 'matomo.php'])
        _paq.push(['setSiteId', '3'])
        var d = document,
          g = d.createElement('script'),
          s = d.getElementsByTagName('script')[0]
        g.type = 'text/javascript'
        g.async = true
        g.src = u + 'matomo.js'
        s.parentNode.insertBefore(g, s)
      })()</script><div id="root"></div><script type="module" src="/assets/js/main.1b0a549e5eabf7abfd37.es6.js"></script><script nomodule src="/assets/js/main.1b0a549e5eabf7abfd37.es5.js"></script></body></html>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection

