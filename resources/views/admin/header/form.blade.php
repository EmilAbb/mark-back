@extends('admin.layouts.admin')
@section('content')
    <?php  $routeName='admin.header' ?><br>
    <div class="card">

        <div class="card-body">
            <form action="{{ isset($model) ? route($routeName.'.update',$model->id) :  route($routeName.'.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($model)
                    @method('PUT')
                @endisset


                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            @foreach(config('app.languages') as $lang)
                                <li class="nav-item ">
                                    <a
                                        class="nav-link {{$loop->first ? 'active show' : ''}}@error("$lang.title") text-danger @enderror"
                                        id="custom-tabs-one-home-tab" data-toggle="pill" href="#tab-{{$lang}}"
                                        role="tab" aria-controls="custom-tabs-one-home"
                                        aria-selected="true">{{$lang}}</a>
                                </li>

                            @endforeach

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            @foreach(config('app.languages') as $lang)
                                <div class="tab-pane fade {{$loop->first ? 'active show' : ''}}" id="tab-{{$lang}}"
                                     role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="form-group">
                                        <label>Header Name</label>
                                        <input type="text" placeholder="Header Name" name="{{$lang}}[header_name]"
                                               value="{{old($lang.'header_name', isset($model) ? $model->translateOrDefault($lang)->header_name : '' )}}"
                                               class="form-control">
                                        @error("$lang.header_name")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Header Name Text</label>
                                        <input type="text" placeholder="Header Name Text" name="{{$lang}}[header_name_text]"
                                               value="{{old($lang.'header_name_text', isset($model) ? $model->translateOrDefault($lang)->header_name_text : ''  )}}"
                                               class="form-control">
                                        @error("$lang.header_name_text")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Header Title</label>
                                        <input type="text" placeholder="Header Title" name="{{$lang}}[header_title]"
                                               value="{{old($lang.'header_title', isset($model) ? $model->translateOrDefault($lang)->header_title : ''  )}}"
                                               class="form-control">
                                        @error("$lang.header_title")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Header Phone Title</label>
                                        <input type="text" placeholder="Header Phone Title" name="{{$lang}}[header_phone_title]"
                                               value="{{old($lang.'header_phone_title', isset($model) ? $model->translateOrDefault($lang)->header_phone_title : ''  )}}"
                                               class="form-control">
                                        @error("$lang.header_phone_title")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>


                <div class="form-group">
                    <label>Image</label>
                    @isset($model)
                        <br>
                        <img width="200" src="{{asset('storage/'.$model->image)}}">
                    @endisset
                    <input type="file" name="image" class="form-control">
                    @error('image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Header Icon</label>
                    @isset($model)
                        <br>
                        <img width="200" src="{{asset('storage/'.$model->header_icon)}}">
                    @endisset
                    <input type="file" placeholder="Header Icon" name="header_icon"  class="form-control">
                    @error('header_icon')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Header Phone Number</label>
                    <input type="text" placeholder="Header Phone Number" name="header_phone_number" value="{{old('header_phone_number',$model->header_phone_number ?? '')}}" class="form-control">
                    @error('header_phone_number')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>



                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection


