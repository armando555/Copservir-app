@extends('layouts.app')

@section('title') Report @endsection

@section('header-title') Generate Report PDF @endsection

@section('content')

    <div class="row justify-content-center">

        <br>
        <div class="col-md-8">
            <div class="card margin-bottom">
                <div class="card-header">
                    <h3>Generate Report PDF</h3>
                </div>
                <div class="card-body">
                    <a class="btn btn-warning"
                        href="{{ route('cart.generatePdf', $order->getId()) }}">Generate Report in PDF</a>
                    <div class="container">
                        <h1 align="center"> Generate report</h1>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Empresa productora</th>
                                        <th>Dirección de la empresa</th>
                                        <th>E-mail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>CopServir LTDA</td>
                                    <td>Calo, Valle del cauca</td>
                                    <td>atencion.copservir@copservir.co</td>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        </section>
    @endsection