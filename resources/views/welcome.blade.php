@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Generate Short Url</div>
                    @include('includes.error')
                    @include('includes.success')
                   <form method="post" action="{{ route('getShortUrl') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                    <div class="form-group row">
                            <label for="url" class="col-md-4 col-form-label text-md-">{{ __('Put your URL *') }}</label>

						<div class="col-md-6">
							<input id="url" type="text"
								class="form-control @error('url') is-invalid @enderror"
								name="url" value="{{ old('url') }}" required autocomplete="url"
								autofocus>
						</div>
					</div>                                                                                                                       
                                                                                                                                                                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Get Short Url') }}
                                </button>                                
                            </div>
                         </div>   
                         </form>   
                     </div>               
                       
                   </div>      
                </div>        
            </div>

@endsection