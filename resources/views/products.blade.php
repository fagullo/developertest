@extends('layouts.app')

@section('content')
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#most-expensive-products" aria-controls="most-expensive-products" role="tab" data-toggle="tab">Most expensive products</a></li>
    <li role="presentation"><a href="#cheapest-products" aria-controls="cheapest-products" role="tab" data-toggle="tab">Cheapest products</a></li>
  </ul>

  <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="most-expensive-products">
            @foreach($expensiveProducts as $product)
                @include('fragments.product')
            @endforeach
        </div>
        <div role="tabpanel" class="tab-pane" id="cheapest-products">
            @foreach($cheapProducts as $product)
                @include('fragments.product')
            @endforeach
        </div>
    </div>
@endsection
