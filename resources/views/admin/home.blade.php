@extends('general.layout')

@section('title_page','Administration - Fab Calendar')

@section('style_page')
<link rel="stylesheet" href="{{ secure_asset('css/admin.css')}}">
@endsection

@section('content_page')
<h1 class="text-center fw-bolder">Administration</h1>
<div class="form-reservation">
    <h3 class="mb-0 text-center active py-4" data-target=".stats">Gestion des jours d'accès</h3>
    <hr class="m-0">
    <div class="p-5">
        <form class="position-relative">
            @csrf
            <div class="day my-5">
                <label for="day">Jour concerné:</label>
                <select name="day" id="day">
                    @foreach($days as $day)
                        <option value=" {{ $day->id}} ">{{ $day->day_french}}</option>
                    @endforeach
                </select>
            </div>

            <div class="nbr my-5">
                <label for="places">Nombre de places:</label>
                <input type="number" name="places" id="places">
                <p class="errors-msg text-danger places"></p>
            </div>

            <fieldset class="mt-3 hours d-flex justify-content-around align-items-center p-5">
                <legend>Horaires</legend>
                <div class="form-group d-flex">
                    <label for="time_start">Début:</label>
                    <input type="time" name="time_start" id="time_start">
                    <p class="errors-msg text-danger time_start"></p>
                </div>
                <div class="form-group d-flex">
                    <label for="time_end">Fin:</label>
                    <input type="time" name="time_end" id="time_end">
                    <p class="errors-msg text-danger time_end"></p>
                </div>
            </fieldset>

            <button class="btn btn-primary">Valider</button>
        </form>
    </div>
</div>
<div class="handle_account">
    <div class="titles d-flex align-items-center justify-content-center">
        <h3 class="mb-0 text-center active w-50 h-100 py-4" data-target=".stats">Statistiques comptes</h3>
        <h3 class="mb-0 text-center w-50 h-100 py-4" data-target=".table">Validation Compte Apprenant</h3>
    </div>
    <hr class="m-0">
    <div class="contents p-5">
        <table class="w-100 text-center table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>E-mail</th>
                    <th>Formation</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($accountConfirmed as $account)
                    <tr>
                        <td class="py-4">{{ucfirst($account->nom)}}</td>
                        <td class="py-4">{{ucfirst($account->prenom)}}</td>
                        <td class="py-4">{{$account->email}}</td>
                        <td class="py-4">{{$account->formasuiv->formation}}</td>
                        <td class="d-flex justify-content-evenly py-4 align-items-center">
                            @csrf
                            <button data-target="{{ route('account_validation',['id'=>$account->id]) }}" class="btn btn-primary valid">Valider</button>
                            <button data-target="{{ route('account_refuse',['id'=>$account->id]) }}" class="btn btn-danger refuse">Refuser</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="active stats-content pb-5 stats">
            <div class="stats d-flex justify-content-evenly align-items-center position-relative">
                <div class="d-flex align-items-center flex-column">
                {{ count($nbApprenant) }}
                    <span class="">comptes</span>
                    <span>apprenants</span>
                </div>
                <div class="d-flex align-items-center flex-column">
                {{ count($accountValidated)}} <span class="">comptes validé(s)</span>
                    <span></span>
                </div>
                <div class="d-flex align-items-center flex-column">
                {{ count($accountNotConfirmed)+count($accountConfirmed)  }} <span class="">comptes</span>
                    <span>non validé(s)</span>
                </div>
                <button type="button" class="btn btn-primary" data-target="#details"> Voir plus</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ secure_asset('js/admin.js')}}"></script>
@endsection