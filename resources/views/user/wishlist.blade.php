@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="list-group">
            @foreach($wishes as $wish)
                <li class="list-group-item col-md-12">
                    <div class="col-md-9">{{$wish->name}}</div>
                    <div class="col-md-3 text-right">
                        <a href="{{route('product.show', ['productId' => $wish->id])}}" type="submit" class="btn btn-primary" data-toggle="tooltip" title="Show product.">
                            <i class="glyphicon glyphicon-eye-open"></i>
                        </a>
                        <form class="btn-remove" method="post" action="{{ route('product.remove-from-wishlist', ['productId' => $wish->id]) }}">
                            <button type="submit" class="btn btn-danger" data-toggle="tooltip"  title="Remove from wish list.">
                                <i class="glyphicon glyphicon-remove"></i>
                            </button>
                            {!! csrf_field() !!}
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
