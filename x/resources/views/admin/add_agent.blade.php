@extends('layouts.layout_two')
@section('titre')Ajouter un agent @endsection
@section('contenu')
<!-- A enlever lors du deployement -->
{{$agent4='caissier'}}
    <div class="row mx-auto">
        <div class="col-lg-9 card adC ">
            <div class="card-header text-success text-center">
                <?php echo _('Creation du compte ');?>{{$agent6 ?? ''}}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <label for="nomB" >
                            <?php echo _("Nom");?>
                        </label>
                        <input type="text" name="nom" id="" class="form-control" placeholder="votre nom" value="" >
                    </div>
                    <div class="col-lg-4">
                        <label for="nomB" >
                            <?php echo _("Prenom");?>
                        </label>
                        <input type="text" name="prenom" id="" class="form-control" placeholder="votre prenom" value="">
                    </div>
                    <div class="col-lg-4">
                        <label for="nomB" >
                            <?php echo _("Adresse e-mail");?>
                        </label>
                        <input type="mail" name="email" id="" class="form-control" placeholder="nurubanque@gmail.com" value="">
                    </div>                    
                </div>
                <div class="row">
                <div class="col-lg-4">
                    <label for="nomB" ><?php echo _("Matricule Client");?></label>
                    <input type="text" name="matricule" id="" class="form-control" placeholder="matricule" disabled value="">
                </div>
                <div class="col-lg-4">
                    <label for="nomB" ><?php echo _("Password");?></label>
                    <input type="text" name="psswd" id="" class="form-control" placeholder="password" value="">
                </div>
                <div class="col-lg-4">
                    <label for="nomB" ><?php echo _("Numero Tel:");?> </label>
                    <input type="mail" name="numero_tel" id="" class="form-control" placeholder="+243970912428" value="">
                </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="nomB" ><?php echo _("Type de Compte");?></label>
                        <select name="type_compte" id="" class="form-control">
                            @if($agent4==='caissier')
                                <option value="">--<?php echo _("Select Categorie client");?>--</option>
                                <option value="Particulier"><?php echo _("Particulier");?></option>
                                <option value="Actionnaire"><?php echo _("Actionnaire / Investisseur");?></option>
                                <option value="Emploi"><?php echo _("Candidat a l emploi");?></option>
                                <option value="PME"><?php echo _("PME");?></option>
                                <option value="Entreprise"><?php echo _("Entreprise");?></option>
                            @elseif($agent4==='administrateur')
                                <option value="">--<?php echo _("Select Categorie Agent");?>--</option>
                                <option value="caissier"><?php echo _("Caissier");?></option>
                                <option value="informaticien"><?php echo _("Informaticien");?></option>
                                <option value="securite"><?php echo _("Securite");?></option>
                                <option value="autres"><?php echo _("Autres");?></option>
                            @endif
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="nomB" >Genre</label>
                        <select name="genre" id="" class="form-control">
                            <option value="">--<?php echo _("Select Genre");?>--</option>
                            <option value="F"><?php echo _("Feminin");?></option>
                            <option value="M"><?php echo _("Masculin");?></option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="nomB" >Prendre une photo </label>
                        <input type="button" class="form-control" value="<?php echo "Capture";?>" data-toggle="modal" data-target="#photo">
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="nomB" ><?php echo _("Adresse");?></label>
                            <input type="text" name="quart_av" id="" class="form-control" placeholder="Goma, 22 Box Dego" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="nomB"  ><?php echo _("Ville");?></label>
                            <input type="text" name="ville" id="" class="form-control" placeholder="Goma" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="nomB" ><?php echo _("Province");?></label>
                            <input type="text" name="province" id="" class="form-control" placeholder="Nord-Kivu" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="nomB" ><?php echo _("Pays");?></label>
                            <input type="mail" name="pays" id="" class="form-control" placeholder="RDC" disabled value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="apropos"><?php echo _("À propos du Caissier")?>:</label>
                            <textarea name="apropos" placeholder="À propos de moi" class="form-control"> </textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark  mt-2 mb-lg-2 col-lg-3"><?php echo _("Ajouter Agent");?></button>
                    </div>
                </div>
            </div>
        <div class="col-lg-3 align-self-center text-center">
            <p class="card-header"><?php echo _('Photo par defaut du client');?></p>
            <img src="{{url('assets/img/default_user.png")}}" alt="user-default-profil" id="img" class="adC card-img-top rounded-circle" width="80%" height="80%">
        </div>
    </div>
@stop
