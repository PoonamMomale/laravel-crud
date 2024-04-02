@extends('layouts.main');

@section('main-section')
    @foreach($customers as $customer)
    <p class="mt-4">
        {{$customer->customer_id}} - {{$customer->name}} - {{$customer->email}}
        <span><a href="{{route('customer.delete',['id'=>$customer->customer_id])}}"><button class="btn btn-danger mx-3">Delete</button></a></span>
        <span><a href="{{route('customer.edit',['id'=>$customer->customer_id])}}"><button class="btn btn-info mx-3">Update</button></a></span>
    </p>
    @endforeach
@endsection