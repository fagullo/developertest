@extends('layouts.app')

@section('content')

  <div class="panel-group col-md-12 no-padding-left no-padding-right" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-info col-md-12 no-padding-left no-padding-right">
      <div class="panel-heading col-md-12 no-padding-left no-padding-right" role="tab" id="headingOne">
        <h4 class="panel-title col-md-12 no-padding-left no-padding-right">
          <a class="col-md-12" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            Most expensive products
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          @include('fragments.product', ['products' => $expensiveProducts])
        </div>
      </div>
    </div>
    <div class="panel panel-info col-md-12 no-padding-left no-padding-right">
      <div class="panel-heading col-md-12 no-padding-left no-padding-right" role="tab" id="headingTwo">
        <h4 class="panel-title col-md-12 no-padding-left no-padding-right">
          <a class="collapsed col-md-12" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Cheapest products
          </a>
        </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
          @include('fragments.product', ['products' => $cheapProducts])
        </div>
      </div>
    </div>
  </div>
@endsection
