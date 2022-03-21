@extends('layouts.layout_users')
@section('contenu')
    <div class="col-lg-11 mx-auto card adC2">
    @php
    $x=0; 
    $in =array();    
    $out =array(); 
    foreach($transaction as $items)
        {
            if(strpos($items->motif,"par")){
                $in []= $items->montant_ret; 
            }else $out= $items->montant_ret;
        }    
    @endphp
    </div>
@stop