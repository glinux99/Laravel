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
            <tr class="text-white-50">
                <td >
                    Daniel
                </td>
                <td>
                    Daniel
                </td>

                <td>
                    @if (isset($desactivate))
                        <button type="submit" class="btn btn-dark"><?php echo _("Désactiver");?></button>
                    @else
                        <button type="submit" class="btn btn-success"><?php echo _("Activer");?></button>
                    @endif
                        <button type="submit" class="btn btn-danger"><?php echo _("Suppression");?></button>
                </td>
                <td>
                    <small>4507 0495 565 45673</small><br>
                    <small>genesiskikimba@gmail.com</small>
                </td>
                <td>
                    133
                </td>
                <td>
                    Caissier
                </td>
            </tr>
        </tbody>
    </table>
</div>
@stop   