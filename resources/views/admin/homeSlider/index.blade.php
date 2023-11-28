@extends('admin.layouts.admin')
@section('content')

    <?php  $routeName='admin.homeSlider' ?>
    <a class="btn btn-primary my-1" href="{{route($routeName.'.create')}}">Add</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Text</th>
                    <th>Icon</th>
                    <th>OnClick</th>
                    <th>Image</th>
                    <th>Background Image 1</th>
                    <th>Background Image 2</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($models as $model)

                    <tr>
                        <td>{{$model->id}}</td>
                        <td>{{$model->title}}</td>
                        <td>{{$model->text}}</td>
                        <td>{{$model->icon}}</td>
                        <td>{{$model->onclick}}</td>
                        <td><img width="100" height="100" src="{{asset('storage/'.$model->image)}}" alt=""></td>
                        <td><img width="100" height="100" src="{{asset('storage/'.$model->background_img_one)}}" alt=""></td>
                        <td><img width="100" height="100" src="{{asset('storage/'.$model->background_img_two)}}" alt=""></td>


                        <td>
                            <a class="btn bg-yellow" href="{{route($routeName.'.edit',$model->id)}}"><i class="fa-solid fa-pen text-white"></i></a>
                        </td>

                        <td>
                            <form class="delete-form" action="{{route($routeName.'.destroy',$model->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>

                            </form>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>

        </div>
        <div class="container d-flex justify-content-center">
            {{$models->links('pagination::bootstrap-4')}}
        </div>
    </div>
@endsection
