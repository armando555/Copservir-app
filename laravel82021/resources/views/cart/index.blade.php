@extends('layouts.app')

@section('title') Cart  @endsection

@section('header-title') Products to sell @endsection

@section('content')


    <section>
        <div class="row justify-content-center">

            <br>
            <div class="col-md-8">
                <div class="card margin-top margin-bottom">

                    <div class="card-header">
                        <h3> Products to sell</h3>
                    </div>
                    <div class="card-body">
                        <ul class="ul-list">
                            <div style="display:none">
                                {{$count = 1}}    
                            </div>
                            @if (!is_null($data) && isset($data['products']))
                                @if (count($data['products']) > 0) 
                           @foreach ($data['products'] as $item)
                                <h2>Item {{$count}}</h2>
                               <h3>Name:</h3>
                               <p>{{$item->getName()}}</p>
                               <h4>Price:</h4>
                               <p>{{$item->getPrice()}}</p>
                                <div style="display:none">
                                    {{$count= $count + 1}}     
                                </div>
                                <h4>Quantity</h4>
                                <p>{{$quantity[$item->getId()]}}</p>
                                <h4>Cost without IVA</h4>
                                <p>{{$quantity[$item->getId()]*$item->getPrice()}}</p>
                                <h4>Cost with IVA</h4>
                                @if ($item->getPercentage()>0)
                                <p>{{$quantity[$item->getId()]*$item->getPrice()+(($quantity[$item->getId()]*$item->getPrice())*($item->getPercentage()/100))}}</p>    
                                @else
                                <p>{{$quantity[$item->getId()]*$item->getPrice()+(($quantity[$item->getId()]*$item->getPrice())*(1))}}</p>    
                                @endif
                                
                           @endforeach

                        @endif
                        @endif
                        <p>Total without IVA: {{$acu}}</p>
                        <p>Total with IVA: {{$acuIva}}</p>
                               <a href="{{route('cart.sell')}}" class="btn btn-primary"> Sell items and generate report </a>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection