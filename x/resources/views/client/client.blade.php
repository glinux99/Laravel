@extends('layouts.layout_users')
@section('contenu')
    <div class="col-lg-11 row mx-auto">
        <div class="card ">
            jjj
        </div>
        <div class="row mx-auto p-0">
            <div class="col-lg-6 card adC">
                <div class="w-100">
                    <div class="card-header text-success">
                        <?php echo _("Information basique");?>
                    </div>
                    <div class="card-body px-0">
                        <div class="list-group">
                            @php $x = ['Noms'=>'Daniel KIKIMBA','Email'=>'genesiskikimba@gmail.com','Nuru Banque ID'=>'4970642309178502', 'Password'=>'******************************'];
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
                        <?php echo _("Parametre du Compte");?>
                    </div>
                    <div class="card-body px-0">
                        <div class="list-group">
                            <div class="list-group-item d-flex adC">
                                <div class="col-5 text-white">
                                    <?php echo _("Langage");?>
                                </div>
                                <div class="col-7 text-muted">
                                    {{  __("Francais");?>
                                </div>
                            </div>
                            <div class="list-group-item d-flex adC">
                                <div class="col-5 text-white">
                                    <?php echo _("Parametres de confidentialite");?>
                                </div>
                                <div class="col-7 text-muted">
                                    {{  __("Seuls les administrateurs et les agents de la banque
                                     peuvent avoir acces a vos donnees pour mieux proteger votre compte");?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-0 adC align-self-center">
                <div class="card-header text-success">
                    <?php echo _("Information Supplementaire");?>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @php $x = ['Genre'=>'F','Numero Tel'=>'+243 97 0912428','Type de Compte'=>'Caissier', 'Adresse'=>'Goma','Ville'=>'Goma', 'Province'=>'Nord-Kivu', 'Pays'=>'RDC','À propos'=>''];
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