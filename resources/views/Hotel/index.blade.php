
@extends("layouts.master")
 
@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            @session('status')
            <div class="alert alert-success text-center" role="alert">
                {{ $value }}
            </div>
            @endsession
            <div class="row">
                <div class="col">  
                    <h2>
                        Hotels
                    </h2>
                </div>
                <div class="col-2">
                    <a href={{ route('hotel.create')}} class="btn btn-primary mt-1 mx-4">Add hotel</a>
                </div>
            </div>

        </div>
        <div class="card-body">

           
           
            <table class="table table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>image</th>
                    <th>Actioon</th>
                </thead>

                <tbody>

                    @forelse ($hotels as $hotel)
                        <tr>
                            <td>{{$hotel->id}}</td>
                            <td>{{$hotel->name}}</td>
                            <td>{{$hotel->description}}</td>
                            <td>{{$hotel->status}}</td>

                            <td>
                                <img src="{{ asset($hotel->image) }}" alt="Hotel Image" style="width: 100px; height: auto;">
                            </td>
                        
                            <td>
                                <a class="btn btn-success" href={{ route('hotel.edit',$hotel->id) }}>Edit</a>
                                
                                <a class="btn btn-success" href={{ route('hotel.rooms',$hotel->id) }}>Rooms</a>
                                
                                <a  class="btn btn-info" href={{ route('hotel.show',$hotel->id) }}>Show</a>

                                <form class="d-inline" action="{{route('hotel.destroy',$hotel->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-danger text-muted p-2 fs-4">Oops! There are no hotels.</td>
                        </tr>
                    @endforelse
                   
                </tbody>
            </table>

        </div>
    </div>
</div>
       
@endsection