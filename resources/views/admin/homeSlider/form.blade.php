@extends('admin.layouts.admin')
@section('content')
    <?php  $routeName='admin.homeSlider' ?><br>
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
                                        <label>Title</label>
                                        <input type="text" placeholder="Title" name="{{$lang}}[title]"
                                               value="{{old($lang.'title', isset($model) ? $model->translateOrDefault($lang)->title : '' )}}"
                                               class="form-control">
                                        @error("$lang.title")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Text</label>
                                        <input type="text" placeholder="Text" name="{{$lang}}[text]"
                                               value="{{old($lang.'text', isset($model) ? $model->translateOrDefault($lang)->text : ''  )}}"
                                               class="form-control">
                                        @error("$lang.text")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>


                <div class="form-group">
                    <label>Icon</label>
                    <input type="text" placeholder=" Icon" name="icon" value="{{old('icon',$model->icon ?? '')}}" class="form-control">
                    @error('icon')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Onclick</label>
                    <input type="text" placeholder="Onclick" name="onclick" value="{{old('onclick',$model->onclick ?? '')}}" class="form-control">
                    @error('onclick')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
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
                    <label>Background img 1</label>
                    @isset($model)
                        <br>
                        <img width="200" src="{{asset('storage/'.$model->background_img_one)}}">
                    @endisset
                    <input type="file" name="background_img_one" class="form-control">
                    @error('background_img_one')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Background img 2</label>
                    @isset($model)
                        <br>
                        <img width="200" src="{{asset('storage/'.$model->background_img_two)}}">
                    @endisset
                    <input type="file" name="background_img_two" class="form-control">
                    @error('background_img_two')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>




                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection


