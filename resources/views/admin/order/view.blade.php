@extends('admin.admin')
@section('admin')
    <div class="row" style="margin-top: 1rem; margin-left: 1rem">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    ORDER DETAILS
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Customer name: {{$order->customer->first_name}}  {{$order->customer->last_name}}</li>
                    <li class="list-group-item">Customer address: {{$order->customer->address}}</li>
                    <li class="list-group-item">Customer email: {{$order->customer->email}}</li>
                    <li class="list-group-item">Customer phone: {{$order->customer->phone}}</li>
                    <li class="list-group-item">Order Date: {{$order->created_at->format('d/m/Y H:i:s')}}</li>
                </ul>
            </div>
        </div>
    </div>
            <hr/>
            <div class="row" style="margin-left: 1rem">
                <div class="col-md-8">
                    <h4>Product Order:</h4>

                    <table class="table">
                <thead>
                <tr>
                    <th scope="col">Product Id</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>

                </tr>
                </thead>
                <tbody>
                @foreach($order->orderDetails as $detail)
                <tr>
                    <th scope="row">{{$detail->product->id}}</th>
                    <td>{{$detail->product->name}}</td>
                    <td>{{$detail->quantity}}</td>
                    <td>{{$detail->price}}</td>
                </tr>
                </tbody>
                @endforeach
            </table>
            </div>
            </div>
    <hr>

    <div class="row" style="margin-top: 1rem; margin-left: 1rem">
        <div class="col-md-3">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Total: {{number_format($order->total)}}$</li>
                    <li class="list-group-item">Status:
                        @if($order->status == 0)
                            <span class="badge badge-warning-light badge-lg">OPEN</span>
                        @endif

                        @if($order->status == 1)
                            <span class=" badge badge-primary-light badge-lg">CONFIRM</span>
                        @endif

                        @if($order->status == 2)
                            <span class="badge badge-success-light badge-lg">DONE</span>
                        @endif

                        @if($order->status == 3)
                            <span class="badge badge-danger-light badge-lg">CANCEL</span>
                        @endif
                    </li>
                </ul>

                        @if($order->status == 0)
                            <a class="btn btn-outline-dark" href="{{asset('admin/changeStatus')}}/1/{{$order->id}}">Change To CONFIRM</a>
                            <a class="btn btn-outline-dark" href="{{asset('admin/changeStatus')}}/3/{{$order->id}}">Change To CANCEL</a>
                        @endif
                        @if($order->status == 1)
                            <a class="btn btn-outline-dark" href="{{asset('admin/changeStatus')}}/2/{{$order->id}}">Change To DONE</a>
                            <a class="btn btn-outline-dark" href="{{asset('admin/changeStatus')}}/3/{{$order->id}}">Change To CANCEL</a>
                        @endif
                        @if($order->status == 2)
                            <a class="btn btn-outline-dark" href="{{asset('admin/changeStatus')}}/3/{{$order->id}}">Change To Cancel</a>
                        @endif
                </div>
            </div>
        </div>
    <a class="btn btn-outline-dark" style="margin-left: 1rem" href="{{route('order.index')}}">Back to Order Management</a>

@endsection
