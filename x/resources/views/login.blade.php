@extends('layouts.layout_one')
@section('titre')Veuillez vous connecter @endsection
@section ('menu-second')
    <div class="text-end col-lg-8 col-7 my-auto">
        <a href="mailto:security@nurubanque.cd"><?php echo _("Securite");?></a>&nbsp;&nbsp;|
        <a href="mailto:security@nurubanque.cd"><?php echo _("Aide");?></a>
    </div>
@endsection
@section('contenu-start')
    <div class="col-md-10 row mx-auto my-4 text-white-50" style="background: #011720d3">
    <div class="col-md-6 " style="background:#0f222b;">
            <div class="card-body shadow">
                <ul class="nav nav-tabs" id="" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="username-log" data-bs-toggle="tab" href="#username" role="tab" aria-controls="username" aria-selected="true"><?php echo _("Username login");?></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="card-log" data-bs-toggle="tab" href="#card-login" role="tab" aria-controls="card-login" aria-selected="false"><?php echo _("Création du compte ");?></a>
                    </li>
                </ul>
                <div class="tab-content m-auto " id="">
                    <p class="m-0 p-0 text-center">
                        <span class="bi-person bi--8xl"></span>
                    </p>
                    <div class="tab-pane fade show active" id="username" role="tabpanel" aria-labelledby="username-log">
                        <div class="text-center w-75 m-auto">
                            <p class="m-0 p-0"><?php echo _("Veuillez vous connecter a votre compte");?></p>
                            <div class="w-100">
                                <form action="" method="post">
                                    <input type="text" name="username" id="" class="form-control mb-3" placeholder="<?php echo _("nom d'utilisateur ou adresse mail");?>" required>
                                    <input type="password" name="psswd" id="" class="form-control mb-3" placeholder="*************************" required>
                                    <button type="submit" class="btn btn-dark w-50"><?php echo _("Connection");?></button>
                                </form>
                            </div>
                        </div>
                        <div class="row m-auto">
                            <div class="col-6 text-start d-flex py-1">
                                <input class="form-check-input text-white" type="checkbox" id="check">
                                <label class="form-check-label" for="check">
                                    <?php echo _(" Se souvenir de vous");?>
                                </label>
                            </div>
                            <div class="col-6 px-0">
                                <a href="/recovery" class="nav-link ">
                                    <?php echo _("Mot de passe oublie?");?>
                                </a>
                            </div>
                            <p class="text-center"><i>Privacy term of visit</i></p> 
                        </div>
                    </div>
                    <div class="tab-pane fade" id="card-login" role="tabpanel" aria-labelledby="card-log">
                        <div class="text-center w-75 m-auto">
                            <p class="m-0 p-0"><?php echo _("Créez votre compte facilement");?></p>
                            <div class="w-100">
                                <form action="" method="post">
                                    <input type="text" name="name" id="" class="form-control mb-3" placeholder="<?php echo ('votre nom');?>" required>
                                    <input type="text" name="pname" id="" class="form-control mb-3" placeholder="<?php echo ('votre prenom');?>" required>
                                    <input type="password" name="psswd" id="" class="form-control mb-3" placeholder="*********************" required>
                                </form>
                            </div>
                        </div>
                        <div class="w-75 m-auto mb-3">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                                <?php echo _(" J'ai lu et j'accepte les termes de politiques de confidentialites");?>
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark w-50 mt-2"><?php echo _("Soumettre");?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 align-self-center border border-2 border-success" style="background: #0f222b!important;">
            <div class="card-body shadow">
                <p><?php echo _("Bienvenu sur");?></p>
                <p class="h3 col-8" style="color: rgb(39, 148, 29);">NURU MERCHANT PORTAIL</p>
                <div class="d-flex border-bottom border-white border-2">
                    <span class="bi-hand-index bi--3xl me-2"></span>
                    <p>
                        <?php echo _(" Vous pouvez vous connecter a notre banque en ligne et faire
                                            des transferts, achetez en ligne etc. juste en vous connectant
                                            sur votre compte sur www.nurubanque.cd");
                        ?>
                    </p>
                </div>
                <div class="d-flex mt-2">
                    <span class="bi-shield-lock bi--3xl me-2"></span>
                    <p>
                        <?php echo _(" Avis de ne pas partager ou publier vos identifiants sur internet
                                            /Mobile banking et ATM pin avec d'autres personnes incluant le staff de Nurubanque");
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection