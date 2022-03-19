<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('assets/vendor/dist/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{url('assets/vendor/icons/font/bootstrap-icons.css")}}">
    <script src="{{url('assets/vendor/dist/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{url('assets/vendor/dist/js/jquery.min.js")}}"></script>
    <title>@yield('titre')</title>
</head>
<body class="w-100" style="background-image: url('assets/img/banque_img.jpg');background-size: cover;">  
    <div class="m-auto px-3 row text-white-50" style="background: #0f222b;">
        <div class="col-2 col-md-1">
            <img src="{{url('assets/img/logo1.png")}}" class="" height="60" width="80">
        </div>
        <div class="col-7 col-md-10">
            <div class="w-100 d-flex justify-content-center">
                <div class=" d-flex flex-columns">
                    <div class="d-block">
                        <div class="d-flex flex-columns ps-4">
                            <span class="bi-envelope text-success bi--2xl"></span>
                            <div class="ps-2 text-center">
                                <?php echo _("Envoyez-nous un Email");?><br>
                                <small class="text-muted">info@nurubanque.cd</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-block ">
                    <div class="d-flex flex-columns ps-4">
                        <span class="bi-headset text-success bi--2xl"></span>
                        <div class="ps-2 text-center ">
                            <?php echo _("Appelez-nous");?><br>
                            <small class="text-muted">+243 970 912 428</small>
                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-block">
                    <div class="d-flex flex-columns ps-4">
                        <span class="bi-map text-success bi--2xl"></span>
                        <div class="ps-2 text-center">
                            <?php echo _("Localisation: Goma");?><br>
                            <small class="text-muted">Av Les Volcans 345, Goma</small>
                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-block">
                    <div class="d-flex flex-columns ps-4">
                        <span class="bi-map text-success bi--2xl"></span>
                        <div class="ps-2 text-center">
                            <?php echo _("Localisation: Kinshasa");?><br>
                            <small class="text-muted">Av Roi Baudouin 345, Goma</small>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="col-2 col-md-1">
            <img src="{{url('assets/img/logo1.png")}}" class="" height="60" width="80">
        </div>
    </div>
    <div style="background: #011720d3!important; min-height: 2.5rem;" class="row m-auto">
        <div class="col-lg-3 col-5 ps-4 pt-1" style="font-size: 20px;font-weight: bolder;background-color: green;color: white; clip-path: polygon(0 0, 100% 0, 80% 100%, 0% 100%);">Nuru Merchant Bank</div>
        @yield('menu-second')
    </div>
@yield('contenu-start')
<!-- Footer -->
<div style="background: #0f222b;" class="border-top">
    <footer class="py-3 container">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-success"><?php echo _("NURU BANQUE");?></a></li>
        </ul>
        <p class="text-center text-muted ">À propos| Contact | Politique d'utilisation</p>
        <p class="text-center text-muted">copyritht&copy;2022 nurubanque | all rigths reserved | Power by <span style="color: #13c91c;">Subnet Inc.</span></p> 
    </footer>
</div>
<!-- Fin footer -->
</body>
</html>