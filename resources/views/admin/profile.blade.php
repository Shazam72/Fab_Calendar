@extends('general.layout')
@section('title_page','Profil - Fab Calendar')
@section('style_page')
<link rel="stylesheet" href="{{ secure_asset('css/profile.css')}}">
@endsection

@section('profile_active','active')

@section('content_page')
<h1 class="text-center fs-500">Mon Profile</h1>
<section class="container mt-5">
    <div class="row profile-card m-auto">
        <h2 class="card-head mx-5 py-3">Informations personnelles</h2>
        <hr>
        <div class="row card-body col-12 p-5">
            <div class="card-img col-sm-5 col-xs-12 m-auto d-flex justify-content-center align-items-center">
                <img src="{{ secure_asset('/storage/'.auth()->user()->avatars) }}" alt="">
            </div>
            <div class="d-flex flex-column justify-content-center card-text col-sm-6 col-xs-12 ">
                <p>
                    <span class="text-uppercase">Nom:  </span><span class="text-capitalize">{{ auth()->user()->nom }}</span>
                </p>
                <p>
                    <span class="text-uppercase">Prénom(s):  </span><span class="text-capitalize">{{ auth()->user()->prenom }}</span>
                </p>
                <p>
                    <span class="text-uppercase">E-mail:  </span><span>{{ auth()->user()->email }}</span>
                </p>
            </div>
        </div>
        <a href="{{ route('modify_info') }}" class="my-5 btn btn-primary px-5">Modifier</a>
    </div>
</section>

@endsection