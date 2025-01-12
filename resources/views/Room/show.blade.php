

@extends("layouts.master")
 
@section('content')

<div class="container">
    <div class="card mt-3 w-50 mx-auto">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2>
                       show room
                    </h2>
                </div>
                <div class="col-3">
                    <a href={{ route('room.index')}} class="btn btn-primary">Back</a>
                </div>
            </div>

        </div>
        <div class="card-body">

          
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" value="{{$room->name}}" type="text" class="form-control" id="" >
               
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" id="" >
                    {{$room->description}} </textarea>
               
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <input value="{{$room->status}}" type="text" name="status" class="form-control" id="" >
               
            </div>
            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input value="{{$room->qty}}" type="text" name="qty" class="form-control" id="" >
               
            </div>
            <div class="mb-3">
                <label class="form-label">Hotels</label>
               
                <select class="form-control" name="hotel_id" id="">
                <option disabled value="select hotel">Select a hotel</option>
                @foreach ($hotels as $hotel )   
                    <option selected value={{$hotel->id}}>{{$hotel->name}}</option>
                @endforeach
               </select>
               
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input value="{{$room->image}}" required name="image" accept="image/png, image/jpeg, image/jpg" type="file" class="form-control" id="" >
               
            </div>

        </div>
    </div>
</div>
       
@endsection