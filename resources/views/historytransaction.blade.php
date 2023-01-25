@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">History Transaction</div>
                <div class="card-body">
                    <table>
                        <table class="table table-responsive table-striped">
                            <thead>
                                <td>#</td>
                                <td>Date</td>
                                <td>Served by</td>
                                <td>Grandtotal</td>
                                <td>Paytotal</td>
                                <td>Action</td>
                            </thead>
                            @foreach ($histories as $history)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d F Y' , strtotime($history->created_at)) }}</td>
                                <td>{{ $history->user->name}}</td>
                                <td>{{ number_format($history->total) }}</td>
                                <td>{{ number_format($history->pay_total) }}</td>
                                <td><button class="btn btn-sm btn-primary">Detail</button></td>
                            </tr>
                        </table>
                    </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection