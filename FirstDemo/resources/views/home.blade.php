@extends('layouts.main')

@section('main-section')

<div class="container mt-4">
        {{-- @php
            print_r($errors->all());
        @endphp --}}
        <form action="{{url('/')}}/home" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="name"
                    placeholder="John Doe"
                    value={{old('name')}}
                />
                <span class="text-danger">
                    @error('name')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    id="email"
                    placeholder="abc@mail.com"
                    value="{{old('email')}}"
                />
                <span cla``ss="text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    id="password"
                    placeholder="..."
                    value="{{old('password')}}"
                />
                <span class="text-danger">
                    @error('password')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Address</label>
                <input
                    type="text"
                    class="form-control"
                    name="address"
                    id="address"
                    value="{{old('address')}}"
                    placeholder="e.g.city"
                />
                <small id="helpId" class="form-text text-muted">Help text</small>
            </div>
            
            
            <button class="btn btn-primary">Submit</button>
            
        </form>


</div>

@endsection