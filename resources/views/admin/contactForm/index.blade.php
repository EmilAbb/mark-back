@extends('admin.layouts.admin',['title'=>'Contact Message'])

@section('content')
    <?php  $routeName='admin.contactForm' ?>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contactMessage as $message)
                    <tr>
                        <td>{{$message->id}}</td>
                        <td>{{$message->name}}</td>
                        <td>{{$message->phone}}</td>
                        <td>{{$message->email}}</td>
                        <td>{{$message->message}}</td>
                        <td>
                            <form class="delete-form" action="{{route($routeName.'.destroy',$message->id)}}" method="POST">
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
    </div>
@endsection

