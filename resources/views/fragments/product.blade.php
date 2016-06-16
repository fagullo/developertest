@foreach($products as $product)
<div class="col-md-6 col-sm-12 col-xs-12 product-container">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">{{$product->name}}</h3>
    </div>
    <div class="panel-body">
      <div class="col-md-7 product-image">
        <img src="{{$product->image}}" alt="Norway" height="200px" />
      </div>
      <div class="col-md-5">
        <div class="col-md-12 col-sm-12 col-xs-12"> {{$product->properties}} </div>
        <div class="price col-md-12 col-sm-12 col-xs-12"> € {{$product->price}} </div>
      </div>
    </div>

    @if($is_logged_in)

      <div class="panel-footer text-center">
        @if($user->isWished($product->id))

          <form method="post" action="{{ route('product.remove-from-wishlist', ['productId' => $product->id]) }}">
            <button type="submit" class="btn btn-danger" aria-label="Left Align">
              <span style="margin-right: 15px;">Remove from wish list</span>
              <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
            </button>

            {!! csrf_field() !!}
          </form>

        @else

          <form method="post" action="{{ route('product.add-to-wishlist', ['productId' => $product->id]) }}">
            <button type="submit" class="btn btn-success" aria-label="Left Align">
              <span style="margin-right: 15px;">Add to wish list</span>
              <span class="glyphicon glyphicon-star" style="color: yellow" aria-hidden="true"></span>
            </button>

            {!! csrf_field() !!}
          </form>

        @endif

      </div>
    @endif
  </div>
</div>
@endforeach
