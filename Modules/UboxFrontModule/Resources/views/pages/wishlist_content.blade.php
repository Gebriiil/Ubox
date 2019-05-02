<table class="shopping-cart-table table">
    <thead>
    <tr>
        <th>@lang('uboxfrontmodule::front.product')</th>
        <th></th>
        <th class="text-center">@lang('productmodule::product.price')</th>
        <th class="text-right"></th>
    </tr>
    </thead>
    <tbody>

    @forelse( user()->wishlist as $product )

        <tr>
            <td class="thumb"><img src="{{ $product->photo_path }}" alt=""></td>
            <td class="details">
                <a href="{{route('only_product' , $product->id)}}">{{ $product->title  }}</a>
                <ul>
                    <li><span></span></li>
                    <li><span></span></li>
                </ul>
            </td>

            @if ($product->offers and $product->offers->active == 1)

            <td class="price text-center"><strong>{{ offer_price($product)['offer_price']  }}</strong><br><del class="font-weak"><small>{{ $product->sell_price }}</small></del></td>
            @else
                <td class="price text-center"><strong>{{ offer_price($product)['offer_price']  }}</strong>{{ $product->sell_price }}</td>

            @endif

            <td class="text-right"><button id="{{$product->id}}" class="main-btn delBtn icon-btn"><i class="fa fa-close"></i></button></td>
        </tr>
    @empty
        <tr>
            <td>
                <div class="alert-danger alert">@lang('uboxfrontmodule::front.is_empty')</div>
            </td>
        </tr>
    @endforelse


    </tbody>

</table>
