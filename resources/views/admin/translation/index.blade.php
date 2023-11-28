@extends('admin.layouts.admin',['title'=>'Translations'])
@section('content')

    <?php  $routeName='admin.translation' ?>
    <a class="btn btn-primary my-1" href="{{route($routeName.'.create')}}">Add</a>
    <br>
    <div class="card ">
        <div class="card-body">
            <table class="table table-bordered" style="text-align: center">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Key</th>
                    <th style="width: 50px">Edit</th>
                    <th style="width: 50px">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($models  as $model)
                    <tr>
                        <td>{{$model->id}}</td>
                        <td>{{$model->title}}</td>
                        <td>{{$model->key}}</td>
                        <td>
                            <a href="{{route($routeName.'.edit',$model->id)}}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form class="delete-form" action="{{ route($routeName.'.destroy',$model->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button style="background-color: #fff;border: none" class="btn btn-danger"><script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                                    <lord-icon
                                        src="https://cdn.lordicon.com/jmkrnisz.json"
                                        trigger="hover"
                                        colors="primary:#121331"
                                        style="width:45px;height:45px">
                                    </lord-icon></button>
                            </form>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
            <div class="container d-flex justify-content-center">
                {{$models->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
@endsection
