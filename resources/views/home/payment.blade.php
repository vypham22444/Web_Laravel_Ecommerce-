@extends('layouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('home/home.css') }}">
@endsection

@section('js')
	<script type="text/javascript" src="{{asset('home/home.js') }}"></script>
@endsection

@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{ route('nd') }}">Home</a></li>
                <li class="active">payment</li>
            </ol>
        </div><!--/breadcrums-->
        
        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-3">
                    
                </div>
                
                				
            </div>
            <div class="review-payment">
                <h2>Xem lại giỏ hàng</h2>
            </div>

            <div class="table-responsive cart_info delete_cart_url">
                <?php
                $content = Cart::content();
                ?>
                <table class="table table-condensed update_cart_url">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Hình ảnh</td>
                            <td class="description"></td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Tổng</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($content as $contents)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img style="width:100px; height:100px; object-fit: contain"
                                        src="{{ asset('') . $contents->options->image }}" alt="">
                                    </a>
                                </td>
                                <td class="cart_description">
                                    <h4><a name="cart_name" href="">{{ $contents->name }}</a></h4>
                                    <p name="cart_id">ID: {{ $contents->id }}</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{ number_format($contents->price) }} </p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <!-- <a class="cart_quantity_up" href=""> + </a> -->
                                        <p>{{ $contents->qty }}</p>
                                        <!-- <a class="cart_quantity_down" href=""> - </a> -->
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{ number_format($contents->price * $contents->qty) }} VNĐ</p>
                                </td>
                                <td class="cart_delete">
                                    <!-- <a class="cart_quantity_delete" href="{{ route('updateCart', ['rowId' => $contents->rowId]) }}" >Cập Nhật</a> -->
                                    <a class="cart_quantity_delete" href="{{ route('deleteCart', ['rowId' => $contents->rowId]) }}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                
            </div>
        </div>
        
        <div class="col-sm-12 clearfix">
            <div class="bill-to">
                <p>Điền thông tin gửi hàng</p>
                <div class="form-one">
                    <form action="" method="POST">
                        {{csrf_field()}}
                        <input type="text" name="email" placeholder="Email">
                        <input type="text" name="name" placeholder="Họ và Tên">
                        <input type="text" name="address" placeholder="Địa chỉ">
                        <input type="text" name="phone" placeholder="phone">
                        <textarea name="notes"  placeholder="Ghi chú về đơn đặt hàng của bạn, Ghi chú đặc biệt khi giao hàng" rows="16"></textarea>

                        <input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">
                        
                    </form>
                </div>
                
            </div>
        </div>
        <form action="{{ route('orderPlace') }}" method="POST">
        {{csrf_field()}}
            <div class="payment-options">
                <!-- <span>
                    <label><input name="payment_option" value="bằng ATM" type="checkbox"> Trả bằng thẻ ATM</label>
                </span> -->
                <span>
                    <label><input name="payment_option" value="2" type="checkbox"> Nhận tiền mặt </label>
                </span>
                <!-- <span>
                    <label><input name="payment_option" value="thẻ ghi nợ" type="checkbox"> Thanh toán thẻ ghi nợ</label>
                </span> -->
                <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
            </div>
        </form>
    </div>
</section> <!--/#cart_items-->

@endsection