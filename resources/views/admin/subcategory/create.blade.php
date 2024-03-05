@extends('layouts.admin')

@section('admincontent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@if(isset($subcategory)) Update Item @else Create Item @endif</div>

                <div class="card-body">
                    @if(isset($subcategory)) 
                     
                    <form action="{{ route('sub-category.update', ['sub_category' => $subcategory->id]) }}" method="POST">
                        @method('PUT')
                    @else 
                    <form action="{{ route('sub-category.store') }}" method="POST">
                    @endif
                        @csrf 
                        <div class="form-group row py-2">
                            <label for="Item name" class="col-md-4 col-form-label text-md-right">Item Name</label>

                            <div class="col-md-6">

                                <input id="sub_category_name" type="text" class="form-control @error('sub_category_name') is-invalid @enderror" name="sub_category_name" value="{{ old('sub_category_name', isset($subcategory) ? $subcategory->sub_category_name : '') }}" required autocomplete="sub_category_name" autofocus>

                                @error('sub_category_name')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row py-2">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">Category</label>
                            <div class="col-md-6">
                                <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror required">
                                    <option value="">Select Category</option>
                                    @foreach($category as $cats)
                                      <option value="{{$cats->id}}" {{ isset($subcategory) && $subcategory->category_id === $cats->id ? 'selected' : '' }}>{{$cats->category_name}}</option> 
                                    @endforeach
                                </select>
                                
                                @error('category_name')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row py-2">

                        <input type="hidden" id="field_type" name="field_type" value="input" /> 
                        <input type="hidden" id="input_type" name="field_type" value="decimal" />
                             
                        <div class="form-group row py-2">
                            <label for="validation" class="col-md-4 col-form-label text-md-right">Validation</label>
                            <div class="col-md-6">
                                <select id="validation" name="validation" class="form-control @error('validation') is-invalid @enderror required">
                                    <option value="">Choose Validation</option> 
                                    <option value="optional" {{ isset($subcategory) && $subcategory->validation === 'optional' ? 'selected' : '' }}>
                                        Optional
                                    </option>
                                    <option value="required" {{ isset($subcategory) && $subcategory->validation === 'required' ? 'selected' : '' }}>
                                        Required
                                    </option> 
                                </select>
                                
                                @error('category_name')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>
 
                        <div class="form-group row py-2">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($subcategory) ? 'Update Item' : 'Create Item' }}
                                </button>

                                <button type="button" class="btn btn-secondary btn-space" onClick="window.history.back();">
                                    Cancel
                                </button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection