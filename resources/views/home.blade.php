@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome '.Auth::user()->name) }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form method="POST" id="">
                        <div class="row">
                            <div class="col-auto">
                                <label>Please specify how much to be paid</label>
                                <input type="number" min="5" step="0.01", class="form-control" name="value" value="{{ mt_rand(500, 100000) / 100 }}" required>
                            </div>
                            <div class="col-auto">
                                <label>Available Currencies</label>
                                <select class="form-control" required>
                                    <option label="Select a currency" disabled></option>
                                    @foreach($currencies as $currency)
                                        <option value="{{$currency->iso}}">{{ strtoupper($currency->iso) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Select the desired platform</label>
                                <div class="form-group" id="toggler">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        @foreach($paymentPlatforms as $paymentPlatform)
                                            <label class="btn btn-outline-secondary rounded m-2 p-1"
                                                   data-target="#{{ $paymentPlatform->name }}Collapse"
                                                   data-toggle="collapse">
                                                <input type="radio" name="payment_platform" value="{{ $paymentPlatform->id }}" required>
                                                <img src="{{ asset($paymentPlatform->image) }}" class="img-thumbnail">
                                            </label>
                                        @endforeach
                                    </div>
                                    @foreach($paymentPlatforms as $paymentPlatform)
                                        <div id="{{ $paymentPlatform->name }}Collapse" class="collapse" data-parent="#toggler">
                                            @includeIf('components.' . strtolower($paymentPlatform->name) . '-collapse')
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 text-center row">
                            <div class="col-12">
                                <button type="submit" id="payButton" class="btn btn-primary btn-lg">Pay</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
