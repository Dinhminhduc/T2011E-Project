@extends('admin.admin')
@section('admin')

<div class="col-12" style="margin-top: 1rem">
    <div class="box">
        <div class="box-header">
            <h4 class="box-title align-items-start flex-column">
                Order Status
                <small class="subtitle">Status of all bill</small>
            </h4>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-border">
                    <thead>
                    <tr class="text-uppercase bg-lightest">
                        <th style="min-width: 50px"><span class="text-white">Id</span></th>
                        <th style="min-width: 150px"><span class="text-fade">Customer Name</span></th>
                        <th style="min-width: 100px"><span class="text-fade">Customer Address</span></th>
                        <th style="min-width: 150px"><span class="text-fade">Order Date</span></th>
                        <th style="min-width: 130px"><span class="text-fade">status</span></th>
                        <th style="min-width: 120px">Total</th>
                        <th style="min-width: 130px"><span class="text-fade">View</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lsOrder as $order)
                    <tr>
                        <td>
                            {{$order->id}}
                        </td>
                        <td>
                            <span class="text-fade font-weight-600 d-block font-size-16">
                                        {{$order->customer->first_name}} {{$order->customer->last_name}}
                            </span>
                        </td>
                        <td>
                            <span class="text-fade font-weight-600 d-block font-size-16">
                                {{$order->customer->address}}
                            </span>
                        </td>
                        <td>
                            <span class="text-fade font-weight-600 d-block font-size-16">
                                {{$order->created_at->format('d/m/Y')}}
                                 - {{$order->created_at->diffForHumans()}}
                            </span>
                        </td>
                        <td>
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
                        </td>
                        <td>
                            {{number_format($order->total,2)}}
                        </td>
                        <td>
                            <a href="{{route('orderProduct.show',$order->id)}}" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-arrow-right"></span></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$lsOrder->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
