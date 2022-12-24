@extends('layouts.main') 
@section('title', 'Product')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush

    
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-users bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('product')}}</h5>
                            <span>{{ __('List of Product')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Product')}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- start message area-->
            @include('include.message')
            <!-- end message area-->
             
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-header"><h3>{{ __('Product')}}</h3></div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{__('ID')}}</th>
                                    <th>{{ __('Name')}}</th>                                   
                                    <th>{{ __('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product as $key => $product)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        {{-- <a data-toggle="modal" data-target="#fullwindowModal{{ $product->id }}" href="{{ route('product.edit',$product->id) }}"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>  --}}
                                        <a data-toggle="modal" data-target="#exampleModalCenter{{ $product->id }}"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>  
                                        <div class="modal fade" id="exampleModalCenter{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterLabel">{{ __('Modal title')}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">                                                        
                                                            <div class="card">
                                                                {{-- <div class="card-header"><h3>{{ __('Default form')}}</h3></div> --}}
                                                                <div class="card-body">
                                                                    <form class="forms-sample" method="POST" action="{{ route('product.update',$product->id) }}">
                                                                        @csrf
                                                                        @method('PUT')   
                                                                        <div class="form-group">
                                                                            {{-- <label for="exampleInputUsername1">{{ __('Username')}}</label> --}}
                                                                            {{-- <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username"> --}}
                                                                            <label for="name">{{ __('Name')}}<span class="text-red">*</span></label>
                                                                            <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required>
                                                                            <div class="help-block with-errors"></div>
                                                                            @error('name')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>                                                                    
                                                                        <br />
                                                                        <br /> 
                                                                        <div class="modal-footer">                                                                 
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close')}}</button>
                                                                            <button type="submit" class="btn btn-primary">{{ __('Update')}}</button>     
                                                                        </div>                                                                    
                                                                    </form>
                                                                </div>
                                                            </div>                                                      
                                                    </div>
                                                    {{-- <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close')}}</button>
                                                        <button type="button" class="btn btn-primary">{{ __('Save changes')}}</button>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                   
                                        <a style="color:black" href="{{ route('product.destroy',$product->id) }}" onclick="event.preventDefault();
                                            document.getElementById('delete-form-{{ $product->id }}').submit();">
                                           <i class="ik ik-trash-2 f-16 text-red"></i>
                                        </a>
                                        <form id="delete-form-{{ $product->id }}" action="{{ route('product.destroy',$product->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <!-- push external js -->
    @push('script')
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    <!--server side users table script-->
    <script src="{{ asset('js/custom.js') }}"></script>
    @endpush
@endsection
