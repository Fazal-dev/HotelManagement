

@extends("layouts.master")
 
@section('content')

<div class="container">
    <div class="card mx-auto w-50 mt-3">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2>
                        Craete room
                    </h2>
                </div>
                <div class="col-3">
                    <a href={{ route('room.index')}} class="btn btn-primary">Back</a>
                </div>
            </div>

        </div>
        <div class="card-body">

          <form action={{ route('room.store') }} method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" value="{{old('name') ?? ''}}" type="text" class="form-control" id="" >
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" id="" >
                    {{old('description') ?? ''}}
                </textarea>
                @error('description')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <input value="{{old('status') ?? ''}}" type="text" name="status" class="form-control" id="" >
                @error('status')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Hotels</label>
               <select class="form-control" name="hotel_id" id="">
                <option selected disabled value="select hotel">Select a hotel</option>
                @foreach ($hotels as $hotel )   
                <option value={{$hotel->id}}>{{$hotel->name}}</option>
                @endforeach
               </select>
                @error('status')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input value="{{old('qty') ?? ''}}" type="number" name="qty" class="form-control" id="" >
                @error('qty')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input accept=".png" value="{{old('image') ?? ''}}" required name="image" type="file" class="form-control" id="" >
                @error('image')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
               <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>

        </div>
    </div>
</div>
       
@endsection