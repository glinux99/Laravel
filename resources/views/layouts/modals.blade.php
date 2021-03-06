<!-- Modal -->
@php 
                $url='';
                if(!isset($def)){
                  $data=session('data');
                  if(session('account')==='Client'){
                  $data=json_decode(json_encode($data),true);
                  if(!empty($data['photo'])) $url =$data['photo'];
                }else if(isset($data_users['photo'])){
                  $url =$data_users['photo'];
                }
                }
              @endphp
<div class="modal fade" id="recherche" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="recherchedropLabel" aria-hidden="true">
  <div class="modal-dialog">
  <form action="/alter_account" method="post">
  @csrf
    <div class="modal-content adC text-white">
      <div class="modal-header" style="background: #0f222b!important;">
        <h5 class="modal-title" id="recherchedropLabel">{{ __("MODIFICATION DU COMPTE ")}} 
        @if(session('account')==='Admins')
         {{ __("DE L'AGENT")}} 
         @else
          {{ __("DU CLIENT")}} 
         @endif</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >
        </button>
      </div>
      <div class="modal-body">
            <input type="text" name="username" id="" class="form-control mb-3" placeholder='{{ __("Noms du client")}}'>
            <input type="text" name="mail" id="" class="form-control mb-3" placeholder='{{ __("mail ou matricule du Client")}}'>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">{{ __("Rechercher") }}</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __("Annuler") }}</button>
      </div>
    </div>
   </form> 
  </div>
</div>
@php if(isset($modal_aff)){
  echo "<script>
window.onload=function(){
        $('#click').click();
    }
</script>";
}
else{
  $data_users = array(
    'nom'=>'',
    'prenom'=>'',
    'matricule'=>'',
    'solde'=>''
  );
}
@endphp
<button data-bs-toggle="modal" data-bs-target="#affichersolde" id="click" hidden></button>
<div class="modal show" id="verifier_solde" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="1" aria-labelledby="verifier_soldedropLabel" aria-hidden="false">
  <div class="modal-dialog">
  <form action="/verifier_solde" method="post">
  @csrf
    <div class="modal-content adC text-white">
      <div class="modal-header" style="background: #0f222b!important;">
        <h5 class="modal-title" id="verifier_soldedropLabel">{{ __("V??RIFIER SOLDE DU COMPTE ")}} </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >
        </button>
      </div>
      <div class="modal-body">
            @if (session('account')==='Client')
            <label for="">{{ __("Tapez votre mot de passe pour confimer la requette") }}</label>
            <input type="password" name="psswd" id="" class="form-control" placeholder="*****************">
            @else
            <input type="text" name="username" id="" class="form-control mb-3" placeholder='{{ __("Noms du client") }}'>
            <input type="text" name="mail" id="" class="form-control mb-3" placeholder='{{ __("mail ou matricule du Client") }}'>
            @endif
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">{{ __("Rechercher") }}</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __("Annuler") }}</button>
      </div>
    </div>
   </form> 
  </div>
</div>


<!-- D??p??t -->
<div class="modal show" id="depot" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="1" aria-labelledby="depotdropLabel" aria-hidden="false">
  <div class="modal-dialog">
  <form action="/depot_argent" method="post">
  @csrf
    <div class="modal-content adC text-white">
      <div class="modal-header" style="background: #0f222b!important;">
        <h5 class="modal-title" id="depotdropLabel">{{ __("D??P??T SUR LE COMPTE CLIENT ")}} </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >
        </button>
      </div>
      <div class="modal-body">
      <label for="">{{ __("Nom ")}}:</label>
            <input type="text" name="username" id="" class="form-control mb-3" placeholder="{{ __('Noms du deposant') }}">
            <label for="">{{ __("Matricule du Compte Beneficiaire")}}:</label>
            <input type="text" name="mail" id="" class="form-control mb-3" placeholder='{{ __("mail ou matricule du Client")}}'>
            <label for="">{{ __("Montant")}}:</label>
            <div class="input-group mb-3">
                <input type="number" name="montant" id="" class="form-control" min='0'>
                <span class="input-group-text" id="basic-addon2">USD</span>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">{{ __("Valider") }}</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __("Annuler") }}</button>
      </div>
    </div>
   </form> 
  </div>
</div>
<!-- Retrait -->
<div class="modal show" id="retrait" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="1" aria-labelledby="retraitdropLabel" aria-hidden="false">
  <div class="modal-dialog">
  <form action="/retrait_argent" method="post">
  @csrf
    <div class="modal-content adC text-white">
      <div class="modal-header" style="background: #0f222b!important;">
        <h5 class="modal-title" id="retraitdropLabel">{{ __("RETRAIT SUR LE COMPTE CLIENT ")}} </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >
        </button>
      </div>
      <div class="modal-body">
      <label for="">{{ __("Nom ")}}:</label>
            <input type="text" name="username" id="" class="form-control mb-3" placeholder='{{ __("Noms du deposant") }}'>
            <label for="">{{ __("Matricule du Compte Beneficiaire")}}:</label>
            <input type="text" name="mail" id="" class="form-control mb-3" placeholder='{{ __("mail ou matricule du Client") }}'>
            <label for="">{{ __("Montant")}}:</label>
            <div class="input-group mb-3">
                <input type="number" name="montant" id="" class="form-control" min='0'>
                <span class="input-group-text" id="basic-addon2">USD</span>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">{{ __("Valider") }}</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __("Annuler") }}</button>
      </div>
    </div>
   </form> 
  </div>
</div>
<!-- Virement -->
<div class="modal show" id="virement" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="1" aria-labelledby="retraitdropLabel" aria-hidden="false">
  <div class="modal-dialog">
  <form action="/virement" method="post">
  @csrf
    <div class="modal-content adC text-white">
      <div class="modal-header" style="background: #0f222b!important;">
        <h5 class="modal-title" id="virementdropLabel">{{ __("VIREMENT SUR UN AUTRE COMPTE CLIENT ")}} </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >
        </button>
      </div>
      <div class="modal-body">
            <label for="">{{ __("Nom ")}}:</label>
            <input type="text" name="username" id="" class="form-control mb-3" placeholder='{{ __("Noms du deposant/client")}}'>
            <label for="">{{ __("Matricule du Compte Beneficiaire")}}:</label>
            <input type="text" name="mail" id="" class="form-control mb-3" placeholder='{{ __("mail ou matricule du beneficiaire") }}'>
            <label for="">{{ __("Montant")}}:</label>
            <div class="input-group mb-3">
                <input type="number" name="montant" id="" class="form-control" min='0'>
                <span class="input-group-text" id="basic-addon2">USD</span>
            </div>
            <label for="">{{ __("Votre password ")}}:</label>
            <input type="password" name="psswd" id="" class="form-control mb-3" placeholder='{{ __("password pour confirmer l'envoie") }}''>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">{{ __("Valider") }}</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __("Annuler") }}</button>
      </div>
    </div>
   </form> 
  </div>
</div>
<!-- Rapportn Cli -->
<div class="modal show" id="rapport" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="1" aria-labelledby="rapportdropLabel" aria-hidden="false">
  <div class="modal-dialog">
  <form action="{{ url('rapport')}}" method="post">
  @csrf
    <div class="modal-content adC text-white">
      <div class="modal-header" style="background: #0f222b!important;">
        <h5 class="modal-title" id="rapportdropLabel">{{ __("RAPPORT SUR LE COMPTE CLIENT ")}} </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >
        </button>
      </div>
      <div class="modal-body">
          @if(session('account')!='Client')
            <input type="text" name="mail" id="" class="form-control" placeholder="{{ __('nom d\'utilisateur ou mail')}}">
          @else
          <p class="text-center"> {{ __("Votre mot de passe pour confimer la requette") }}</p>
          <input type="password" name="psswd" id="" class="form-control mb-3" placeholder="{{ __('Votre mot de passe')}}">
          @endif
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger"> {{ __("Valider") }}</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __("Annuler") }}</button>
      </div>
    </div>
   </form> 
  </div>
</div>
<!-- Div prendre photo -->
<div class="modal show" id="photo" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="1" aria-labelledby="rapportdropLabel" aria-hidden="false">
  <div class="modal-dialog">
  <div class="modal-content adC text-white">
      <div class="modal-header" style="background: #0f222b!important;">
        <h5 class="modal-title" id="photodropLabel">{{ __("Prendre une photo")}} </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >
        </button>
      </div>
      <div class="modal-body">
        <video id="video_capture" autoplay class="w-100"></video>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" id="capture"> {{ __("Capture") }}</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="confirmer" style="display: none">{{ __("Valider") }}</button>
      </div>
    </div> 
  </div>
</div>
<!-- Afficher le resultat et la photo du client -->
@if(session('account')!='Admins')
    <div class="modal fade show" id="affichersolde" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="1" aria-labelledby="verifier_soldedropLabel" aria-hidden="false">
  <div class="modal-dialog modal-lg">
  <form action="/verifier_solde" method="post">
  @csrf
    <div class="modal-content adC text-white ">
      <div class="modal-header" style="background: #0f222b!important;">
        <h5 class="modal-title" id="verifier_soldedropLabel">{{ __("V??RIFIER SOLDE DU COMPTE  : RESULTAT")}} </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-6 align-self-center pe-0 me-0">
              <p class="text-center"><span class="bi-person bi--8xl d-none d-md-block"></span><br>
                  {{ __("Information du Compte")}}
              </p>
              <label for=""> {{ __("Noms") }}:</label>
                  <input type="text" name="username" id="" class="form-control mb-3" placeholder='{{ __("Noms du client")}}' value="{{  $data_users['nom'].' '.$data_users['prenom']}}" readonly>
                  <label for=""> {{ __("Matricule") }}:</label>
                  <input type="text" name="mail" id="" class="form-control mb-3" placeholder='{{ __("mail ou matricule du Client")}}' value="{{ $data_users['matricule']}}" readonly>
                  <div class="input-group">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> {{ __("Solde") }}</span>
                    <input type="text" class="form-control" value="{{ $data_users['solde'].' USD'}}"aria-describedby="basic-addon1" readonly>
                  </div>
                  </div>
              </div>
              <div class="col-6">
                <img src="{{url($url)}}" alt="user-default-profil" id="img" class="adC card-img-top rounded-circle" width="80%" height="90%">
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __("fermer") }}</button>
      </div>
    </div>
   </form> 
  </div>
</div>
@endif
@php $modal_aff=0; @endphp