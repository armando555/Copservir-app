@extends('layouts.app')

@section('title') List Products @endsection

@section('header-title') Product @endsection

@section('content')


    <section>
        <div class="row justify-content-center">

            <br>
            <div class="col-md-8">
                @include('util.message')
                <div class="card margin-top margin-bottom">

                    <div class="card-header">
                        <h3> Products</h3>
                    </div>
                    <div class="card-body">
                        <ul class="ul-list">
                            
                            
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection