

@extends("layouts.master")
 
@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2>
                        Rooms
                    </h2>
                </div>
                <div class="col-3">
                    <a href={{ route('room.create')}} class="btn btn-primary">Add room</a>
                </div>
            </div>

        </div>
        <div class="card-body">

            @session('status')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
            @endsession
           
            <table class="table table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>image</th>
                    <th>Qty</th>
                    <th>Hotel</th>
                    <th>Actioon</th>
                </thead>

                <tbody>

                    @foreach ($rooms as $room)
                    <tr>
                        <td>{{$room->id}}</td>
                        <td>{{$room->name}}</td>
                        <td>{{$room->description}}</td>
                        <td>{{$room->status}}</td>
                        <td>{{$room->image}}</td>
                        <td>
                            {{$room->qty}}
                        </td>
                        <td>{{$room->hotel_id}}</td>
                        <td>
                            <a class="btn btn-success" href={{ route('room.edit',$room->id) }}>Edit</a>
                            
                            <a  class="btn btn-info" href={{ route('room.show',$room->id) }}>Show</a>

                            <form class="d-inline" action="{{route('room.destroy',$room->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button  type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                  
                </tbody>
            </table>

        </div>
    </div>
</div>
       
@endsection