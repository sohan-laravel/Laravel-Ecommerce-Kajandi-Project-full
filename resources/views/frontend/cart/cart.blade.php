@extends('frontend.front_view.front_master')
@section('page-title','Cart Product')
@section('main_content')
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">My Shopping Bag</h1>
        </header>
        <div class="row">
            <div class="col-md-9 ">
                <div class="table-responsive">
                        <div class="form-wrapper">
                            <table border="0">
                                <tr>
                                    <th>Product</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Quality</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>

                            @foreach(Cart::Content() as $item)
                                    {!! Form::open(['url'=>'update-cart','method'=>'POST']) !!}
                                <tr class="single-item">
                                    <td><img src="{{$item->options->image}}"></td>
                                    <td><span class="pro-name">{{$item->name}}</span></td>
                                    <td><span class="price">${{$item->price}}</span></td>
                                    <td><input maxlength="12" class="input-text qty" title="Qty" size="4" value="{{$item->qty}}" name="qty">
                                        <button type="submit"><i class="fa fa-refresh"></i></button>
                                    </td>
                                    <td><span class="cart-price"> <span class="price">${{$item->price*$item->qty}}</span> </span></td>
                                    <td><a class="button remove-item" title="Remove item" href="{{url('/remove-cart-item/'.$item->rowId)}}"><span><span><i class="fa fa-times-circle"></i></span></span></a></td>
                                </tr>
                                    <input type="hidden" name="id" value="{{$item->rowId}}">
                                    {!! Form::close() !!}
                                @endforeach

                            </table>
                        </div>

                </div>


            </div>

            <div class="col-md-3 total-price98">
                <div class="row">

                    <div class="col-md-6 col-sm-6 col-xs-6"><p>Subtotal</p></div>
                    <div class="col-md-6 col-sm-6 col-xs-6"> <span class="price">${{Cart::subtotal()}}</span></div>
                </div>

                <div class="row">

                    <div class="col-md-6 col-sm-6 col-xs-6"><p>Shipping</p></div>
                    <div class="col-md-6 col-sm-6 col-xs-6"> <p>Free</p></div>
                </div>

                {{--<div class="row">--}}
                    {{--<div class="col-md-6 col-sm-6 col-xs-6"><p>Tax</p></div>--}}
                    {{--<div class="col-md-6 col-sm-6 col-xs-6"><span class="price">$70.00</span></div>--}}
                {{--</div>--}}

                <div class="row">

                    <div class="col-md-6 col-sm-6 col-xs-6"><p>Total</p></div>
                    <div class="col-md-6 col-sm-6 col-xs-6"><span class="price">${{Cart::total()}}</span></div>
                </div>
                <div class="row">
                    <div class="col-md-12"><a class="btn btn-primary" href="{{route('billing')}}">Checkout</a></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="shopping654">
                    <a href="{{route('shop')}}">Continue shopping</a>
                    {{--<a href="">Update Bag</a>--}}
                </div>
            </div>
        </div>
    </div>
    @endsection