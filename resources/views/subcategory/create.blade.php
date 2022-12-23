@extends('layouts.main') 
@section('title', 'Add SubCategory')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    @endpush

    
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Add SubCategory')}}</h5>
                            <span>{{ __('Create new user, assign roles & permissions')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Add Category')}}</a>
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
                <div class="card ">
                    <div class="card-header">
                        <h3>{{ __('Add SubCategory')}}</h3>
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('subcategory.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name')}}<span class="text-red">*</span></label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" placeholder="Enter user name" required>
                                        <div class="help-block with-errors"></div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>    
                                </div>   
                            </div>   
                            {{-- <div class="form-group {{ $errors->has('categories') ? 'has-error' : '' }}">
                                <label for="categories">Categories</label>
                                <select name="category" id="categories" class="form-select" required>
                                <option>Select Categories</option> 
                                @php 
                                    $albs = App\Album::where('user_id','=',Auth::user()->id)->pluck('category');																					
                                @endphp 
                                    @foreach (App\Category::all()->pluck('name', 'id') as $key => $val)
                                        @if($album->category == $key)
                                            <option value="{{ $key }}" selected>{{ $val }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $val }}</option>
                                        @endif
                                    @endforeach	
                                </select>                                  
                                @if ($errors->has('categories'))
                                    <span class="text-danger">{{ $errors->first('categories') }}</span>
                                @endif       
                            </div> --}}

                            <div class="row">                       
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">{{ __('Category')}}</label>
                                        <select class="form-control" name="category_id" required>
                                            <option>{{ __('Select Category')}}</option>
                                            @foreach($category as $key => $val)
                                                <option value="{{ $key }}">{{ $val }}</option>
                                            @endforeach    
                                        </select>
                                    </div>
                                </div>
                            </div>  <br />
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">{{ __('Submit')}}</button>
                                    </div>
                                </div>    
                            </div>                 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
    @push('script') 
        <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
         <!--get role wise permissiom ajax script-->
        <script src="{{ asset('js/get-role.js') }}"></script>
    @endpush
@endsection
