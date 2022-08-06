<?php
$order = \App\Models\Order::where('order_id',$order_id)->first();
if ($order) {
    $orderitems = \App\Models\OrderList::where('order_id',$order->id)->get();
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css">@media print {
            *, ::after, ::before, div::first-letter, div::first-line {
                text-shadow: none;
                -webkit-box-shadow: none;
                box-shadow: none
            }
            thead {
                display: table-header-group
            }
            img, tr {
                page-break-inside: avoid
            }
            h3 {
                orphans: 3;
                widows: 3
            }
            h3 {
                page-break-after: avoid
            }
            .table {
                border-collapse: collapse
            }
            .table td, .table th {
                background-color: #fff
            }
            .table-bordered td, .table-bordered th {
                border: 1px solid #ddd
            }
        }
        ::after {-webkit-box-sizing:inherit;box-sizing:inherit}
        ::before {-webkit-box-sizing:inherit;box-sizing:inherit}
        @media (min-width: 576px) {
            .container {
                padding-right: 15px;
                padding-left: 15px
            }
        }
        @media (min-width: 768px) {
            .container {
                padding-right: 15px;
                padding-left: 15px
            }
        }
        @media (min-width: 992px) {
            .container {
                padding-right: 15px;
                padding-left: 15px
            }
        }
        @media (min-width: 1200px) {
            .container {
                padding-right: 15px;
                padding-left: 15px
            }
        }
        @media (min-width: 576px) {
            .container {
                width: 540px;
                max-width: 100%
            }
        }
        @media (min-width: 768px) {
            .container {
                width: 720px;
                max-width: 100%
            }
        }
        @media (min-width: 992px) {
            .container {
                width: 960px;
                max-width: 100%
            }
        }
        @media (min-width: 1200px) {
            .container {
                width: 1140px;
                max-width: 100%
            }
        }
        .table-striped tbody tr:nth-of-type(odd) {background-color:rgba(0, 0, 0, 0.05)}
        :focus {outline:0}
        *:before {-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
        *:after {-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
        *:before {-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
        *:after {-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
        @media only screen and (max-width: 575px) {
            .container {
                max-width: 100%
            }
        }</style>
</head>
<body><div class="container" style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline; margin-left:auto; margin-right:auto; padding-left:15px; padding-right:15px; position:relative; width:1170px" valign="baseline" width="1170">
    <h3 class="head-title pb-3 text-center order-head" style='margin-bottom:0.5rem; margin-top:0; color:#d05b06; font-family:"Playfair Display", serif; font-weight:bold; line-height:1.1; font-size:30px; background:transparent; border:0; font-style:inherit; margin:10px 0; outline:0; padding:0; vertical-align:baseline; padding-bottom:100px; text-align:center; padding-top:40px' valign="baseline" align="center">My Order Summary</h3>
    <table class="table table-striped" style="background-color:transparent; border-collapse:collapse; background:transparent; border:solid 1px #ddd; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:auto; outline:0; padding:0; vertical-align:baseline; border-spacing:0; margin-bottom:1rem; max-width:100%; width:80%" valign="baseline" width="80%">
        <thead style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline" valign="baseline">
        <tr style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline" valign="baseline">
            <th style='text-align:right; background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:17px; font-style:inherit; font-weight:500; margin:0; outline:0; padding:0.75rem; vertical-align:bottom; border-top:1px solid #eceeef; border-bottom:none; color:#000; width:275px' align="right" valign="bottom" width="275">Order Id :</th>
            <th style='text-align:left; background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:17px; font-style:inherit; font-weight:500; margin:0; outline:0; padding:0.75rem; vertical-align:bottom; border-top:1px solid #eceeef; border-bottom:none; color:#000; width:275px' align="left" valign="bottom" width="275">{{$order->order_id}}</th>
        </tr>
        </thead>
        <tbody style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline" valign="baseline">
        <tr style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline" valign="baseline">
            <td style='background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000; text-align:right' valign="top" align="right">Amount Paid : </td>
            <td style='background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000' valign="top">₹ {{$order->payable_price}}</td>
        </tr>
        <tr style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline" valign="baseline">
            <td style='background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000; text-align:right' valign="top" align="right">Status : </td>
            <td style='background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000' valign="top">{{$order->status}}</td>
        </tr>


        </tbody>
    </table>


    <div style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline; margin-top:50px" valign="baseline">
        <!-- /.card-header -->
        <div class="" style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline" valign="baseline">
            <table class="table table-bordered" style="background-color:transparent; border-collapse:collapse; background:transparent; border:solid 1px; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:auto; outline:0; padding:0; vertical-align:baseline; border-spacing:0; margin-bottom:1rem; max-width:100%; width:80%" valign="baseline" width="80%">
                <thead style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline" valign="baseline">
                <tr style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline" valign="baseline">
                    <th style='text-align:center; background:transparent; border:1px solid #cd5905; font-family:"Nunito", sans-serif; font-size:17px; font-style:inherit; font-weight:500; margin:0; outline:0; padding:0.75rem; vertical-align:bottom; border-top:1px solid #eceeef; border-bottom:1px solid #d05b06; border-bottom-width:2px; color:#000; width:275px' align="center" valign="bottom" width="275">Product image</th>
                    <th style='text-align:center; background:transparent; border:1px solid #cd5905; font-family:"Nunito", sans-serif; font-size:17px; font-style:inherit; font-weight:500; margin:0; outline:0; padding:0.75rem; vertical-align:bottom; border-top:1px solid #eceeef; border-bottom:1px solid #d05b06; border-bottom-width:2px; color:#000; width:275px' align="center" valign="bottom" width="275">Product Name</th>
                    <th style='text-align:center; background:transparent; border:1px solid #cd5905; font-family:"Nunito", sans-serif; font-size:17px; font-style:inherit; font-weight:500; margin:0; outline:0; padding:0.75rem; vertical-align:bottom; border-top:1px solid #eceeef; border-bottom:1px solid #d05b06; border-bottom-width:2px; color:#000; width:275px' align="center" valign="bottom" width="275">Price</th>
                    <th style='text-align:center; background:transparent; border:1px solid #cd5905; font-family:"Nunito", sans-serif; font-size:17px; font-style:inherit; font-weight:500; margin:0; outline:0; padding:0.75rem; vertical-align:bottom; border-top:1px solid #eceeef; border-bottom:1px solid #d05b06; border-bottom-width:2px; color:#000; width:275px' align="center" valign="bottom" width="275">Quantity</th>
                    <th style='text-align:center; background:transparent; border:1px solid #cd5905; font-family:"Nunito", sans-serif; font-size:17px; font-style:inherit; font-weight:500; margin:0; outline:0; padding:0.75rem; vertical-align:bottom; border-top:1px solid #eceeef; border-bottom:1px solid #d05b06; border-bottom-width:2px; color:#000; width:275px' align="center" valign="bottom" width="275">Total</th>
                </tr>
                </thead>
                <tbody style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline" valign="baseline">
                @foreach($orderitems as $row)
                    <tr style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline" valign="baseline">
                        <td style='background:transparent; border:1px solid #cd5905; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000; text-align:center' valign="top" align="center">
                            <img style="border-style:none; vertical-align:middle; background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; -ms-interpolation-mode:bicubic; height:auto; max-width:100%; width:40%" src="{{ URL::to('/') }}/public/uploads/images/{{ @$row->product->image }}" valign="middle" height="auto" width="40%">
                        </td>
                        <td style='background:transparent; border:1px solid #cd5905; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000; text-align:center' valign="top" align="center">{{ @$row->product->name }}</td>
                        <td style='background:transparent; border:1px solid #cd5905; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000; text-align:center' valign="top" align="center">₹ {{ @$row->selling_price }}</td>
                        <td style='background:transparent; border:1px solid #cd5905; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000; text-align:center' valign="top" align="center">{{ @$row->quantity }}</td>
                        <td style='background:transparent; border:1px solid #cd5905; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000; text-align:center' valign="top" align="center">&#8377; {{ @$row->selling_price * $row->quantity }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <h3 class="head-title pb-3 text-center order-head" style='margin-bottom:0.5rem; margin-top:0; color:#d05b06; font-family:"Playfair Display", serif; font-weight:bold; line-height:1.1; font-size:30px; background:transparent; border:0; font-style:inherit; margin:10px 0; outline:0; padding:0; vertical-align:baseline; padding-bottom:1rem; text-align:center; padding-top:40px' valign="baseline" align="center">Shipping Address</h3>

    <table class="table table-striped " style="background-color:transparent; border-collapse:collapse; background:transparent; border:solid 1px #ddd; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:auto; outline:0; padding:0; vertical-align:baseline; border-spacing:0; margin-bottom:50px; max-width:100%; width:50%" valign="baseline" width="50%">
        <tbody style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline" valign="baseline">
        <tr style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline" valign="baseline">
            <td style='background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000; text-align:right' valign="top" align="right">Name :</td>
            <td style='background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000' valign="top">{{$order->name}}</td>
        </tr>
        <tr style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline" valign="baseline">
            <td style='background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000; text-align:right' valign="top" align="right">Email :</td>
            <td style='background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000' valign="top">{{$order->email}}</td>
        </tr>
        <tr style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline" valign="baseline">
            <td style='background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000; text-align:right' valign="top" align="right">Phone :</td>
            <td style='background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000' valign="top">{{$order->phone}}</td>
        </tr>
        <tr style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline" valign="baseline">
            <td style='background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000; text-align:right' valign="top" align="right">Address :</td>
            <td style='background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000' valign="top">{{$order->address}}</td>
        </tr>
        <tr style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline" valign="baseline">
            <td style='background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000; text-align:right' valign="top" align="right">Landmark :</td>
            <td style='background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000' valign="top">{{$order->landmark}}</td>
        </tr>
        <tr style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline" valign="baseline">
            <td style='background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000; text-align:right' valign="top" align="right">City :</td>
            <td style='background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000' valign="top">{{$order->city}}</td>
        </tr>
        <tr style="background:transparent; border:0; font-family:inherit; font-size:100%; font-style:inherit; font-weight:inherit; margin:0; outline:0; padding:0; vertical-align:baseline" valign="baseline">
            <td style='background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000; text-align:right' valign="top" align="right">Pincode :</td>
            <td style='background:transparent; border:0; font-family:"Nunito", sans-serif; font-size:16px; font-style:inherit; font-weight:400; margin:0; outline:0; padding:0.75rem; vertical-align:top; border-top:1px solid #eceeef; color:#000' valign="top">{{$order->pincode}}</td>
        </tr>
        </tbody>
    </table>
</div></body>
</html>
