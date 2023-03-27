@extends('layouts.app')

@section('content')
<div class="mx-auto w-4/5">
    <h1 class="text-5xl text-gray-800 font-bold pt-12 mb-8">
        Shopping Cart
    </h1>

    <select name="currency" id="currency" onchange="currencyChange()">
        <option value="usd" selected>USD</option>
        <option value="rsd" >RSD</option>
        <option value="eur" >EUR</option>
    </select>

    <hr class="border-1 border-gray-300">
</div>

<div class="flex flex-col mx-auto w-4/5">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th 
                            scope="col" 
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>

                        <th 
                            scope="col" 
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Details
                        </th>

                        <th 
                            scope="col" 
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Price
                        </th>

                        <th 
                            scope="col" 
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Quantity
                        </th>
                        
                        <th 
                            scope="col" 
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Total <span id="currency_symbol">$</span>
                        </th>
                        
                        <th 
                            scope="col" 
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Delete
                        </th>
                    </tr>
                </thead>

                {{-- provera da li sesija cartItems postoji --}}
                @if (session('cartItems'))
                    {{-- prolazak kroz sesiju --}}
                    @foreach (session('cartItems') as $id => $value)
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr data-id="{{ $id }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img 
                                            class="h-10 w-10 rounded-full" 
                                            src="{{ asset($value['image_path']) }}" 
                                            alt="{{ $value['name'] }}">
                                    </div>

                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $value['name'] }}
                                        </div>

                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $value['details'] }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <span 
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    $ {{ $value['price'] }}
                                </span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{--  --}}
                                {{--  --}}
                                    {{--  --}}
                                    {{--this.form.submit()   --}}
                                    {{-- onchange="funckija()" --}}
                                {{-- <form action="{{ route('update.from.cart', $id) }}" method="POST"> --}}
                                {{-- @csrf --}}
                                    {{-- id = quantity-2 --}}
                                    {{-- id = quantity-1 --}}

                                    {{-- 2. nacin - id select elementa koji u sebi sadrzi id proizvoda --}}
                                    <select name="quantity" id="quantity-{{$id}}" onchange="updateAJAX(this.id)"  >
                                    {{-- 1. nacin - ID proizvoda --}}
                                    {{-- <select name="quantity" id="quantity-{{$id}}" onchange="updateAJAX({{$id}})"  > --}}
                                        @for ($i = 1; $i <= 10; $i++)
                                            {{-- nacin da u dropdown meniju oznacimo kolicinu na frontu   --}}
                                            <option  value="{{ $i }}" {{ $value['quantity'] == $i ? 'selected' : ''}}>
                                                {{ $i }} 
                                            </option>
                                        @endfor
                                    </select>
                                {{-- </form> --}}
                            </td>
                            
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                               <div class="text-sm text-gray-900 total" id="total">
                                    {{ $value['quantity'] * $value['price'] }} 
                                </div>
                            </td>

                            <td class="px-6 whitespace-nowrap text-right text-sm font-medium">
                                {{-- briisanje na ruti delete.from.cart --}}
                                <a href="{{ route('delete.from.cart', $id) }}" role="button" class="text-red-600 hover:text-red-900">Delete</a>
                            </td>
                        </tr>
                        
                        
                    </tbody>
                    @endforeach

                    @else
                    <td align="left" colspan="3">
                        <p class="font-bold text-l text-black py-6 px-4">
                            Shopping cart is empty.
                        </p>
                    </td>
                @endif
                <button class="btn btn-success btn-lg float-right" type="submit">Checkout</button>
                </table>
            </div>
        </div>
    </div>
</div>
<script>console.log("ee")</script>
@endsection

@section("scripts")
<script src="https://code.jquery.com/jquery-3.6.4.js" 
integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" 
crossorigin="anonymous"></script>

<script>
function updateAJAX(e) 
{

    // 1. nacin - saljemo id proizvoda kroz parametar funkcije
    //NE RADI AJAX :(( 
    /*var izabranaKolicina = $('#quantity-'+id).val();
    console.log("Id proizvoda: " + id + " Izabrana kolicina: " + izabranaKolicina);

    $.ajax({
        url: '{{ route('update.from.cart') }}',
        method: "post",
        data: {
            _token: '{{ csrf_token() }}'
            id: id,
            quantity: izabranaKolicina,
        },
        success: function(response) {
            console.log("Uspesno" + response);
        }
    });
    */


    // drugi nacin, radi ajax
    console.log("Usao sam u funkciju.");
    var ele = $(this);
    var el_q = String("#"+e);
    console.log("Quantity you choose:"+$(el_q).val() );
    
     $.ajax({
            url: '{{ route('update.from.cart') }}',
            method: "post",
            data: {
                _token: '{{ csrf_token() }}', 
                id: e.split('-')[1], 
                quantity: $(el_q).val()
            },
            success: function (response) {
               console.log("uspesno" );
                //location.reload();
            }
        });

    
}

let default_currency = 'usd';
function currencyChange(){
    const currency = $("#currency").val();
    const url = "https://cdn.jsdelivr.net/gh/fawazahmed0/currency-api@1/latest/currencies/"+default_currency+"/"+currency+".json";
    $.getJSON(url, function(data){
        const total_all = $(".total");
        for(red of total_all){
            console.log(red.innerText);
            const red_float = parseFloat(red.innerText);
            if(currency=="eur"){
                red_novi = (red_float*data.eur).toFixed(2);
                $("#currency_symbol").text("€");
            }else if(currency=="usd"){
                red_novi = (red_float*data.usd).toFixed(2);
                $("#currency_symbol").text("$");
            }else{
                red_novi = (red_float*data.rsd).toFixed(2);
                $("#currency_symbol").text("din");
            }
            red.innerText = red_novi;
        }
        default_currency = currency;
    });
}
</script>
@endsection