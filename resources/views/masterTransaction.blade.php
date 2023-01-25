@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-responsive table-striped">
                    <thead>
                        <td>#</td>
                        <td>Category</td>
                        <td>Item</td>
                        <td>Price</td>
                        <td>Stock</td>
                        <td>Action</td>
                    </thead>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($item->price) }}</td>
                        <td>{{ $item->stock }}</td>
                        <form action="{{ route('transaction.store') }}" method="POST">
                            @csrf
                        <td>
                            <input type="hidden" name="item_id" value="{{ $item->id }}">
                            <input type="hidden" name="qty" value="1">
                            <input type="submit" class="btn btn-sm btn-success text-light" value="Add to Cart">
                        </td>
                        </form>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-header">cart</div>
            <div class="card-body">
                <table class="table table-responsive table-striped">
                        <thead>
                            <td>#</td>
                            <td>Item</td>
                            <td class="col-md-2">Qty</td>
                            <td>Subtotal</td>
                            <td>Action</td>
                        </thead>
                        @foreach ($carts as $cart)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cart->name }}</td>
                            <td><input type="number" class="form-control" min="1" max="{{ $cart->stock + $cart->cart->qty }}"
                                value="{{ $cart->cart->qty }}" onchange="ubah{{$loop->iteration}}()">
                            </td>
                            <td>{{ number_format($cart->price*$cart->cart->qty) }}</td>
                            <td>
                                <button id="update{{ $loop->iteration }}" class="btn btn-sm btn-primary" style="display: none">Update</button>
                                <button id="hapus{{ $loop->iteration }}" class="btn btn-sm btn-danger" style="display: ">Hapus</button>
                            </td>
                        </tr>
                        <script>
                            function ubah{{ $loop->iteration }}(){
                                document.getElementById("update{{ $loop->iteration }}").style.display="inline";
                                document.getElementById("hapus{{ $loop->iteration }}").style.display="none";
                            }
                        </script>
                        @endforeach
                                <form action="{{ route('transaction.checkout') }}" method="POST">
                                    @csrf
                                    <tr>
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <td class="text-end" colspan="3">Grand Total</td>
                                        <td colspan="2"><input type="number" class="form-control" disabled name="total" value="{{ $carts->sum(function($item) {
                                            return $item->price * $item->cart->qty; 
                                        })}}"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-end" colspan="3">Payment</td>
                                        <td colspan="2"><input class="form-control" type="number" class="form-control" min="{{ $carts->sum(function($item) {
                                            return $item->price * $item->cart->qty;
                                        })}}" name="paytotal"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <input type="submit" class="btn btn-primary" value="checkout">
                                        </td>
                                        <td>
                                        <input type="reset" class="btn btn-danger" value="reset">
                                        </td>
                                    </tr>
                                </form>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
