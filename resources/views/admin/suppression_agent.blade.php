@extends('layouts.layout_two')
@section('titre')ASuppressionm desactivation ou activation des agents et Clients @endsection
@section('contenu')
<div class="card-body text-success text-center overflow-auto w-100 p-1">
    <table class="adC table w-100 table-striped table-hover table-bordered text-primary table-card">
        <thead>
            <tr>
                <td>
                    <?php echo _("Nom");?>
                </td>
                <td>
                    <?php echo _("Prenom");?>
                </td>
                <td>
                    <?php echo _("Status du compte");?>
                </td>
                <td>
                    <?php echo _("Matricule / E-mail");?>
                </td>
                <td>
                    <?php echo _("Solde");?>
                </td>
                <td>
                    <?php echo _("Type de compte");?>
                </td>
                     </tr>
                    </thead>
                    <tbody >
            @foreach($data_users as $items)
                @if(!empty($items->type_compte))
                <tr class="text-white-50">
                <td >
                    {{ $items->nom}}
                </td>
                <td>
                {{ $items->prenom}}
                </td>
                
                <td>@php $desactivate=$items->status_compte;
                    @endphp
                    @if ($desactivate)
                        <a class="btn btn-dark" href="/desactive/{{$items->id}}"><?php echo _("Desactiver");?></a>
                    @else
                        <a  class="btn btn-success" href="/active/{{$items->id}}"><?php echo _("Activer");?></a>
                    @endif
                        <a class="btn btn-danger" href="/delete/{{$items->id}}"><?php echo _("Suppression");?></a>
                </td>
                <td>
                    <small>{{ $items->matricule}}</small><br>
                    <small>{{ $items->adresse_mail}}</small>
                </td>
                <td>
                {{ $items->solde}}
                </td>
                <td>
                {{ $items->type_compte}}
                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
@stop   