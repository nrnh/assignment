@extends('layouts.app')

@section('content')
<div class="container m-10">
    <div class="text-xl my-4">
        <h2>Your Cart</h2>
    </div>

    <table class="table-auto justify-center w-full">
        <tr class="bg-white">
            <th class="px-4 py-2">No.</th>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Brand</th>
            <th class="px-4 py-2">Price</th>
            <th class="px-4 py-2">Quantity</th>
            <th class="px-4 py-2"></th>
        </tr>
        @foreach($cart as $row)
        <tr>
            <td class="border px-4 py-2">{{ ++$i }}</td>
            <td class="border px-4 py-2">{{ $row->product_name }}</td>
            <td class="border px-4 py-2">{{ $row->product_brand }}</td>
            <td class="border px-4 py-2">RM{{ $row->product_price }}</td>
            <td class="border px-4 py-2">{{ $row->product_quantity }}</td>
            <td class="border flex justify-center px-4 py-2">
                <form action="{{ route('cart.destroy', $row->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded">Remove</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        {{ $cart->links() }}
    </div>
    
    <p>Ship to {{ Auth::user()->address }}</p> 
    <p>Total price: RM{{ $total }}</p>

    
    <form action="{{ route('cart.store', $row->id) }}" method="post">
        @csrf
        @foreach($cart as $row)
        <input type="hidden" name="product_id" value="{{ $row->product_id }}">
        <input type="hidden" name="product_name" value="{{ $row->product_name }}">
        <input type="hidden" name="product_brand" value="{{ $row->product_brand }}">
        <input type="hidden" name="product_price" value="{{ $row->product_price }}">
        <input type="hidden" name="product_quantity" value="{{ $row->product_quantity }}">
        @endforeach
        <button type="submit" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 rounded">Place Order</button>
    </form>
</div> 
   

@endsection