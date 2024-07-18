@include('layout.user')
    <div class="flex">
        @include('layout.nav')

<div>
    <p class="font-bold text-3xl text-center my-6">Sản phẩm yêu thích</p>

       <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($favoriteProducts as $product)
                <div class="flex items-center justify-center p-2">
                    <div class="relative w-full">
                        <a href="{{route('detail',$product->product->id)}}">
                        <img src="{{ asset($product->product->img)}}" alt=" Image" class="w-full object-cover rounded-lg shadow-lg" style="height:350px">
                        </a>
                        <p class="text-center">{{ \Illuminate\Support\Str::limit($product->product->name, 30, '...') }}</p>
                        <p class="text-center font-bold text-xl">{{number_format($product->product->price,0,',','.')}} đ</p>
                        {{-- <a href="#" class="absolute top-0 right-0 text-white text-xs font-bold px-2 py-1 rounded-bl-lg add-to-favorites" data-product-id="{{ $product->id }}">
                            
                                <svg version="1.1" class="w-8 h-8 favorite-icon" data-favorited="false" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 37 32" enable-background="new 0 0 37 32" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="#ffffff" d="M33.582,2.483c-1.776-1.56-4.077-2.418-6.481-2.418c-2.767,0-5.49,1.134-7.472,3.112l-0.781,0.778 c-0.188,0.188-0.508,0.188-0.697,0l-1.027-1.024C15.23,1.041,12.711,0,10.032,0C7.415,0,4.938,1,3.059,2.814 c-1.87,1.805-2.911,4.287-2.933,6.988c-0.023,2.824,1.095,5.573,3.067,7.541l14.252,14.22C17.728,31.845,18.103,32,18.5,32 s0.772-0.155,1.055-0.437L34.061,17.09c1.952-1.948,3.021-4.645,2.934-7.399C36.906,6.897,35.693,4.338,33.582,2.483z M33.355,16.382L18.849,30.855c-0.188,0.188-0.51,0.188-0.697,0L3.899,16.635c-1.784-1.779-2.794-4.267-2.773-6.824 c0.02-2.431,0.953-4.66,2.627-6.277C5.445,1.9,7.675,1,10.032,1c2.413,0,4.681,0.938,6.387,2.64l1.026,1.024 c0.565,0.564,1.545,0.564,2.11,0l0.78-0.778c1.796-1.792,4.263-2.82,6.766-2.82c2.161,0,4.228,0.77,5.821,2.169 c1.902,1.67,2.993,3.974,3.073,6.488C36.075,12.238,35.138,14.603,33.355,16.382z"></path> </g> </g></svg>
                        </a> --}}
                    </div>
                </div>
            @endforeach
        </div>
</div>
</div>
@include('layout.footer')