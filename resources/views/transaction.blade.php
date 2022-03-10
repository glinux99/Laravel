@extends((session('account')=='Caissier') ? 'layouts.layout_two' : 'layouts.layout_users')
@section('titre') Verification des vos transactions @stop
@section('contenu')
    <div class="card adC">
        <div class="card-header text-center text-success">
            <div class="card-header">
            {{ __("HISTORIQUE DE TRANSACTION DE VOTRE COMPTE")}}
            </div> 
            <a class="btn btn-success mt-2" href="#">{{ __("Generer l'appecu en pdf")}}</a>
            <div class=" mx-auto" style="max-width:max-content">
                <div class="input-group mt-2">
                    <button type="submit" class="btn btn-dark">{{ __("Transaction durant")}}</button>
                    <input type="number" name="" id="" min='1' class="form-control" style="width:6rem;" value="1" ><span class="ms-2 mt-1">{{ __("jours")}}</span>
                </div>
            </div>
        </div>
        <div class="w-100 overflow-auto">
            <table class="text-center table table-bordered table-hover adC text-white">
                <thead>
                    <tr>
                        <td>Date</td>
                        <td>Transaction</td>
                        @if(session('account')!='Client')
                        @if($client!=1)
                        <td>Matricule Client</td>
                        @endif
                        @endif
                        <td>Solde</td>
                        <td>Retrait / Depot </td>
                        <td>Montant_Ret</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaction as $items)
                    <tr>
                        <td>
                            {{ $items->date_trans}}
                        </td>
                        <td>
                            {{ $items->trans_mat}}
                        </td>
                        @if(session('account')!='Client')
                        @if($client!=1)
                        <td>
                            {{ $items->client_mat}}
                        </td>
                        @endif
                        @endif
                        <td>
                            {{ $items->solde}}
                        </td>
                        <td>
                            {{ $items->motif}}
                        </td>
                        <td>
                            {{ $items->montant_ret}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop