@extends('layouts.app')

@section('content')

  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-info">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            Most expensive products
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          @foreach($expensiveProducts as $product)
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
        </div>
      </div>
    </div>
    <div class="panel panel-info">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Cheapest products
          </a>
        </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
          @foreach($cheapProducts as $product)
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
        </div>
      </div>
    </div>
  </div>
@endsection
