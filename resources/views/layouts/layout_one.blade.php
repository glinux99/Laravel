<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('assets/vendor/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendor/icons/font/bootstrap-icons.css')}}">
    <script src="{{url('assets/vendor/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('assets/vendor/dist/js/jquery.min.js')}}"></script>
    <script src="{{url('assets/package/dist/chart.min.js')}}"></script>
    <script src="{{url('assets/vendor/dist/js/jquery.min.js')}}"></script>
    <title>@yield('titre')</title>
</head>
<body class="w-100" style="background-image: url('assets/img/fee.png');background-size: cover;">  
    <div class="m-auto px-3 row text-white-50" style="background: #0f222b;">
        <div class="col-2 col-md-1">
            <img src="{{url('assets/img/logo1.png')}}" class="" height="60" width="80">
        </div>
        <div class="col-7 col-md-10">
            <div class="w-100 d-flex justify-content-center">
                <div class=" d-flex flex-columns">
                    <div class="d-block">
                        <div class="d-flex flex-columns ps-4">
                            <span class="bi-envelope text-success bi--2xl"></span>
                            <div class="ps-2 text-center">
                                {{ __("Envoyez-nous un Email") }}<br>
                                <small class="text-muted">info@nurubanque.cd</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-block ">
                    <div class="d-flex flex-columns ps-4">
                        <span class="bi-headset text-success bi--2xl"></span>
                        <div class="ps-2 text-center ">
                            {{ __("Appelez-nous") }}<br>
                            <small class="text-muted">+243 970 912 428</small>
                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-block">
                    <div class="d-flex flex-columns ps-4">
                        <span class="bi-map text-success bi--2xl"></span>
                        <div class="ps-2 text-center">
                            {{ __("Localisation: Goma") }}<br>
                            <small class="text-muted">Av Les Volcans 345, Goma</small>
                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-block">
                    <div class="d-flex flex-columns ps-4">
                        <span class="bi-map text-success bi--2xl"></span>
                        <div class="ps-2 text-center">
                            {{ __("Localisation: Kinshasa") }}<br>
                            <small class="text-muted">Av Roi Baudouin 345, Goma</small>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="col-2 col-md-1">
            <img src="{{url('assets/img/logo1.png')}}" class="" height="60" width="80">
        </div>
    </div>
    <div style="background: #011720d3!important; min-height: 2.5rem;" class="row m-auto">
        <div class="col-lg-3 col-5 ps-4 pt-1" style="font-size: 20px;font-weight: bolder;background-color: green;color: white; clip-path: polygon(0 0, 100% 0, 80% 100%, 0% 100%);">Nuru Merchant Bank</div>
        @if($login!="ok")
        <div class="col-lg-9 col-7 p-0 m-0 nav navbar-expand-lg">
        <button type="button" class="navbar-toggler p-2  my-auto" data-bs-toggle="collapse" data-bs-target=".men" style="max-height: 40px;">
            <span class="bi-plus"></span>
        </button>
        <div class="collapse navbar-collapse men">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a href="/" class="nav-link text-white">{{ __("Acceuil")}}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route('login')}}" class="nav-link text-white">{{ __("Mon compte")}}</a>
                </li>
                <li class="nav-item">
                    <a href="/#taux" class="nav-link text-white ">{{ __("Taux d'echange")}}</a>
                </li>
                <li class="nav-item">
                    <a href="/mon_epargne" class="nav-link text-white">{{ __("Mon epargne")}}</a>
                </li>
                <li class="nav-item dropdown m-0 p-0">
                    <a href="#" class="nav-link text-white">{{ __("Interm??diaire Financiers")}}</a>
                    <div class="dropdown-content">
                        <div class="dropdown2">
                            <small>{{ __("Reglementation")}}</small>
                            <div class="dropdown-content2 left">
                                <div>
                                    <a href="" class="nav-link p-0 m-0"><small>{{ __("Textes legaux") }}</small></a>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div>
                                    <a href="" class="nav-link p-0 m-0"><small>{{ __("Textes Reglementaires") }}</small></a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown3">
                        <small>{{ __("??tablissements de cr??dits")}}</small>
                            <div class="dropdown-content3 left">
                                <div>
                                    <small>{{ __("Operationnel") }}</small>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div>
                                    <small>{{ __("Radies") }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown4">
                        <small>{{ __("Autres interm??diaire financiers")}}</small>
                        <div class="dropdown-content4 left">
                                <div>
                                    <small>{{ __("Banques") }}</small>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div>
                                    <small>{{ __("Institutions de Micro Finance") }}</small>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div>
                                    <small>{{ __("Coop??ratives d'??pargnes et de cr??dits") }}</small>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div>
                                    <small>{{ __("Institutions financi??res") }}</small>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div>
                                    <small>{{ __("Specialisees") }}</small>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div>
                                    <small>{{ __("Caisse d'??pargne et de cr??dit") }}</small>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div>
                                    <small>{{ __("Societes financieres") }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div>
                        <small>{{ __("Commissaire aux comptes")}}</small>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div>
                        <small>{{ __("Publications")}}</small>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown5">
                        <small>{{ __("Sites et Logiciels")}}</small>
                            <div class="dropdown-content5 left">
                                <div>
                                    <small>{{ __("Site web Microfiance") }}</small>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div>
                                    <small>{{ __("Logiciel BSA") }}</small>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div>
                                    <small>{{ __("Logiciel FinA") }}</small>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div>
                                    <small>{{ __("Logiciel Isys-Ceri") }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="/statistiques" class="nav-link text-white">{{ __("Statistiques")}}</a>
                </li>
                <li class="nav-item">
                    <select  name="langue" id="langue" class="form-control text-success border-0" style="background: #1D264A!important;">
                        <option value="">Langue ????????????????&emsp;</option>
                        <option value="fr" >????????&emsp;Fran??ais</option>
                        <option value="en">????????&emsp;Anglais</option>
                    </select>
                </li>
            </ul>
        </div>
    </div>
        @endif
        @yield('menu-second')
    </div>
    <div class=" p-0 position-relative">
        <div style="z-index: 2!important;" class="position-absolute col-lg-12 mx-auto">@include('layouts.errorException')</div>
        <div class="w-100" style="z-index: 1!important;">
        @yield('contenu-start')
        </div>
    </div>
<!-- Footer -->
<div style="background: #0f222b;" class="border-top">
    <footer class="py-3 container">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-success">{{ __("NURU BANQUE") }}</a></li>
        </ul>
        <p class="text-center text-muted ">{{ __("?? propos") }}| {{ __("Contact") }} | {{ __("Politique d'utilisation") }}</p>
        <p class="text-center text-muted">copyritht&copy;2022 nurubanque | all rigths reserved | Power by <span style="color: #13c91c;">Subnet Inc.</span></p> 
    </footer>
</div>
<!-- Fin footer -->
</body>
</html>
<script>
   document.getElementById('langue').addEventListener('change', function() {
       window.location.href="/locale/"+this.value;
});
</script>
<style>
.left{
    margin-top: -2rem;
    margin-left: 10rem;
}
.dropdown {
  position: relative;
  display: inline-block;
}

*[class^="dropdown-content"] {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 100%;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content, .dropdown2:hover .dropdown-content2,.dropdown3:hover .dropdown-content3,.dropdown4:hover .dropdown-content4,.dropdown5:hover .dropdown-content5  {
  display: block;
}
</style>
