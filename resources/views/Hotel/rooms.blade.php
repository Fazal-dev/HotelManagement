
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
                    <a href={{ route('room.create')}} class="btn btn-primary mt-1 mx-4">Add Room</a>
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
                    <th>qty</th>
                    <th>Action</th>
                </thead>

                <tbody>
                    @forelse ($rooms as $room)
                    
                    <tr>
                        <td>{{$room->id}}</td>
                        <td>{{$room->name}}</td>
                        <td>{{$room->description}}</td>
                        <td>{{$room->status}}</td>
                        <td>
                            <img src="{{ asset($room->image) }}" alt="Room Image" style="width: 100px; height: auto;">
                        </td>
                        
                        
                        <td>
                            <form class="d-inline" action={{ route('book', $room->id) }} method="POST" >
                             @csrf
                            @if ($room->qty == 0)
                                <span class="text-danger"> No Rooms</span>
                            @else
                            <select class="form-select qty-select" name="qty" data-room-id="{{ $room->id }}">
                                <option value="0">Select</option>
                                    @for ($i = 1; $i <= $room->qty; $i++)
                                    <option  value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                            </select>
                            @endif
                           
                        </td>
                        <td>
                            <a class="btn btn-success" href={{ route('room.edit',$room->id) }}>Edit</a>
                            @if ($room->qty == 0)
                            <span></span>
                            @else
                            <button type="submit" class="btn btn-primary book" data-room-id="{{ $room->id }}" id="book">BOOK NOW</button>
                            @endif
                            </form>
                           
                            <a  class="btn btn-info" href={{ route('room.show',$room->id) }}>Show</a>

                            <form class="d-inline" action="{{route('room.destroy',$room->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button  type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-danger text-muted p-2 fs-4">Oops! There are no Rooms .</td>
                    </tr>
                @endforelse
                     
                   
                </tbody>
            </table>

        </div>
    </div>
</div>

<script>


 document.addEventListener('DOMContentLoaded', function () {

        const qtySelectors = document.querySelectorAll('.qty-select');

        const bookNowButtons = document.querySelectorAll('.book');

        qtySelectors.forEach((select) => {

            select.addEventListener('change', function () {

                const selectedQty = parseInt(this.value); 
                const roomId = this.dataset.roomId;

                if (selectedQty > 1) {
                   
                    qtySelectors.forEach((otherSelect) => {
                        if (otherSelect.dataset.roomId !== roomId) {
                            otherSelect.disabled = true;
                        }
                    });
                 
                    bookNowButtons.forEach((button) => {
                        if (button.dataset.roomId !== roomId) {
                            button.disabled = true;
                        }
                    });

                } else {
                   
                    qtySelectors.forEach((otherSelect) => {
                        otherSelect.disabled = false;
                    });

                    bookNowButtons.forEach((button) => {
                        button.disabled = false;
                    });
                }

              
                document.querySelector(`.book[data-room-id="${roomId}"]`).disabled = false;
            });

        });

 })


</script>
       
@endsection