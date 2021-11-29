@extends('layouts.app')

@section('title') List Products @endsection

@section('header-title') Product @endsection

@section('content')


    <section>
        <div class="row justify-content-center">

            <br>
            <div class="col-md-8">
                <div class="card margin-top margin-bottom">

                    <div class="card-header">
                        <h3> Products</h3>
                    </div>
                    <div class="card-body">
                        <ul class="ul-list">
                            @foreach ($data['products'] as $item)
                            <li> <b>Name:</b> {{$item->getName()}}, <b>Price:</b> {{$item->getPrice()}}, <b>Amount:</b> {{$item->getAmount()}}, <b>Iva:</b>  {{$item->getIva()}}, <b> Percentage:</b>{{$item->getPercentage()}}
                                <form method="POST" action="{{ route('product.add', ['id' => $item->getId()]) }}">
                                    @csrf
                                    <b>{{ $item->getPrice() }}$ </b>
                                    <input class="form-control" name="quantity" type="numeric" value="1">
                                    <div class="btn-group margin-top" role="group" aria-label="Basic example">
                                    <button type="submit"
                                        class="btn btn-primary">Add to the cart</button>
                                    </div>
                            </form>
                            </li>    
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection