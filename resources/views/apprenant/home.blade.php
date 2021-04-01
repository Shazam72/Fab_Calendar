@extends('general.layout')
@section('title_page','Home - Fab Calendar')

@section('reservation_modals')
    @csrf

    @foreach($reservations as $reservation)
        @if( count($reservation)==8)
            <div class="modal fade show position-fixed" id="{{ $reservation['day'] }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $reservation['day_french'] }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="d-flex justify-content-between fw-bolder fs-3 align-items-center info">
                                <span class="date">{{ $reservation['date'] }}</span>
                                <span class="time">De {{ $reservation['time_start'] }} à {{ $reservation['time_end'] }}</span>
                            </div>
                            <div class="places mt-5 fw-bold">
                                Il y'a actuellement <span class="fs-3 text-danger">{{ $reservation['places'] }}</span> places de disponibles pour ce jour
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Fermer</button>
                            @if(auth()->user()->role=='apprenant' && $reservation['alreadyRes']==false)
                            <button type="button" class="btn btn-primary reserve" data-target="{{ route('reserve') }}" data-value="{{ $reservation['id'] }}">Réserver</button>
                            @endif
                            @if(auth()->user()->role=='apprenant' && $reservation['alreadyRes']==true)
                            <button type="button" class="btn btn-danger cancel" data-target="{{ route('cancel_res') }}" data-value="{{ $reservation['id'] }}">Annuler</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @elseif(count($reservation)==3)
            <div class="modal fade show position-fixed" id="{{ $reservation['day'] }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $reservation['day_french'] }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="d-flex justify-content-between fw-bolder fs-3 align-items-center info">
                                <span class="date">{{ $reservation['date'] }}</span>
                                <span class="time"></span>
                            </div>
                            <div class="places mt-5 fw-bold">
                                Les paramètres pour ce jour ne sont pas disponibles
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        @else
        @endif
    @endforeach

@endsection

@section('script')
<script src="{{asset('js/apprenant.js')}}"></script>
@endsection