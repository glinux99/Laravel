@extends((session('account')=='Caissier') ? 'layouts.layout_two' : 'layouts.layout_users')
@section('titre') Verification des vos transactions @stop
@section('contenu')
    <div class="card adC">
        <div class="card-header text-center text-success">
            {{ __ ("HISTORIQUE DE TRANSACTION DE VOTRE COMPTE")}} <br>
            <button type="submit" class="btn btn-success">{{ __("Generer l'appecu en pdf")}}</button>
            <div class=" mx-auto" style="max-width:max-content">
                <div class="input-group mt-2">
                    <button type="submit" class="btn btn-dark">{{ __("Transaction durant")}}</button>
                    <input type="number" name="" id="" min='1' class="form-control" style="width:6rem;" value="1" ><span class="ms-2 mt-1">{{ __("jours")}}</span>
                </div>
            </div>
        </div>
        <div class="w-100 overflow-auto">
            <table class="table table-bordered table-striped table-hover adC text-white">
                <thead>
                    <tr>
                        <td>Date</td>
                        <td>Transaction</td>
                        <td>Matricule Client</td>
                        <td>Solde</td>
                        <td>Retrait / Depot </td>
                        <td>Montant</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop