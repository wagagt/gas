@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Rate Purchase
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('rate_purchases.show_fields')
                    <a href="{!! route('ratePurchases.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
