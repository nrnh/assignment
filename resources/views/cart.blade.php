@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h4>Your Cart</h4>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($cart as $row)
            <tr>
                <td scope="row">{{ ++$i }}</td>
                <td scope="row">{{ $row->product_name }}</td>
                <td scope="row">{{ $row->product_brand }}</td>
                <td scope="row">RM{{ $row->product_price }}</td>
                <td scope="row">{{ $row->product_quantity }}</td>
                <td scope="row">
                    <form action="{{ route('cart.destroy', $row->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    
    <div>
        {{ $cart->links() }}
    </div>
    
    <hr/>
    <div class="my-4">
        <p>Ship to {{ Auth::user()->address }}</p> 
        <p>Total price: RM{{ $total }}</p>
    </div>

    <form action="{{ route('cart.store', $row->id) }}" method="post">
        @csrf
        @foreach($cart as $row)
        <input type="hidden" name="product_id" value="{{ $row->product_id }}">
        <input type="hidden" name="product_name" value="{{ $row->product_name }}">
        <input type="hidden" name="product_brand" value="{{ $row->product_brand }}">
        <input type="hidden" name="product_price" value="{{ $row->product_price }}">
        <input type="hidden" name="product_quantity" value="{{ $row->product_quantity }}">
        @endforeach
        <button type="submit" class="btn btn-success">Place Order</button>
    </form>
</div> 
   

@endsection
