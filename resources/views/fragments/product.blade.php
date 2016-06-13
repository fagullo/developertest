@foreach($products as $product)
  <div class="col-md-6 col-sm-12 col-xs-12 product-container">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">{{$product->name}}</h3>
      </div>
      <div class="panel-body">
        <div class="col-md-7 product-image">
          <img src="{{$product->image}}" alt="Norway" height="200px" />
        </div>
        <div class="col-md-5">
          <div class="col-md-12 col-sm-12 col-xs-12"> {{$product->properties}} </div>
          <div class="display: table; position: absolute; height: 100%; width: 100%">
            <div class="price col-md-12 col-sm-12 col-xs-12"> {{$product->price}} </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach
