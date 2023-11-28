@extends('admin.layouts.admin')
@section('content')

    <?php  $routeName='admin.header' ?>
    <a class="btn btn-primary my-1" href="{{route($routeName.'.create')}}">Add</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Header Name</th>
                    <th>Header Name Text</th>
                    <th>Header Title</th>
                    <th>Header Phone Title</th>
                    <th>Header Icon</th>
                    <th>Header Phone Number</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($models as $model)

                    <tr>
                        <td>{{$model->id}}</td>
                        <td>{{$model->header_name}}</td>
                        <td>{{$model->header_name_text}}</td>
                        <td>{{$model->header_title}}</td>
                        <td>{{$model->header_phone_title}}</td>
                        <td>{{$model->header_phone_number}}</td>
                        <td><img width="100" src="{{asset('storage/'.$model->image)}}" alt=""></td>
                        <td><img width="100" src="{{asset('storage/'.$model->header_icon)}}" alt=""></td>


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
