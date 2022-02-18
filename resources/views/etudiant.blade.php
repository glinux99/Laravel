@extends('layout')
<form method="POST" action="{{ route('enreg') }}" >
@csrf
    <input type="text" name="noms" id="" placeholder="Entrez les noms">
    <input type="number" name="age" id="" min="0" step="1" placeholder="Entrez votre age">
    <input type="submit" value="Enregistrer"> 
</form>