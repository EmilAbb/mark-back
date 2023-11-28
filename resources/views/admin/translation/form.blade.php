@extends('admin.layouts.admin',['title'=>'Translations'])


@section('content')
    <?php  $routeName='admin.translation' ?><br>
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


                                </div>
                            @endforeach

                        </div>
                    </div>


                </div>

                <div class="form-group">
                    <label>Key</label>
                    <input type="text" placeholder="Key" name="key" value="{{old('key',$model->key ?? '')}}" class="form-control">
                    @error('key')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


                {{--                <div class="card card-primary card-tabs">--}}
                {{--                    <div class="card-header p-0 pt-1">--}}
                {{--                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">--}}
                {{--                            <li class="pt-2 px-3"><h3 class="card-title">Title</h3></li>--}}
                {{--                            @foreach(config('app.languages') as $langKey)--}}
                {{--                                <li class="nav-item ">--}}
                {{--                                    <a class="nav-link {{$loop->first ? ' active ' : '' }}--}}
                {{--                                          @error("$langKey.title") text-danger @enderror"--}}
                {{--                                       id="custom-tabs-two-home-tab" data-toggle="pill" href="#title-{{$langKey}}"--}}
                {{--                                       role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">--}}
                {{--                                        {{\Illuminate\Support\Str::upper($langKey)}}</a>--}}
                {{--                                </li>--}}
                {{--                            @endforeach--}}
                {{--                        </ul>--}}
                {{--                    </div>--}}





                {{--                    <div class="card-body">--}}
                {{--                        <div class="tab-content" id="custom-tabs-one-tabContent">--}}
                {{--                            @foreach(config('app.languages') as $lang)--}}
                {{--                                <div class="tab-pane fade {{$loop->first ? ' active show' : '' }}--}}
                {{--                                 @error("$langKey.name"  )--}}
                {{--                                                 text-danger @enderror" id="title-{{$lang}}"--}}
                {{--                                     role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">--}}
                {{--                                   <div class="row">--}}
                {{--                                       <div class="form-group col-6">--}}
                {{--                                           <label>Name</label>--}}
                {{--                                           <input type="text" placeholder="name {{$lang}}" name="{{$lang}}[name]"--}}
                {{--                                                  value="{{old("$lang.name",isset($model) ? ($model->translateOrDefault($lang)->name ?? '') : '')}}"--}}
                {{--                                                  class="form-control">--}}
                {{--                                           @error("$lang.name")--}}
                {{--                                           <span class="text-danger">{{$message}}</span>--}}
                {{--                                           @enderror--}}
                {{--                                       </div>--}}
                {{--                                   </div>--}}
                {{--                                </div>--}}
                {{--                            @endforeach--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}


                {{--                <div class="row">--}}
                {{--                    <div class="form-group col-6">--}}
                {{--                        <label>Button Url</label>--}}
                {{--                        <input type="string" placeholder="url" name="button_url"--}}
                {{--                               value="{{old("button_url",isset($model) ? ($model->button_url ?? '') : '')}}"--}}
                {{--                               class="form-control">--}}
                {{--                        @error("button_url")--}}
                {{--                        <span class="text-danger">{{$message}}</span>--}}
                {{--                        @enderror--}}
                {{--                    </div>--}}

                {{--                </div>--}}

                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
