

@extends("layouts.master")
 
@section('content')

<div class="container">
    <div class="card mt-3 w-50 mx-auto">
        <div class="card-header">
            <div class="row ">
                <div class="col">
                    <h2>
                        Create Hotel
                    </h2>
                </div>
                <div class="col-3">
                    <a href={{ route('hotel.index')}} class="btn btn-primary">Back</a>
                </div>
            </div>

        </div>
        <div class="card-body">

          <form action={{ route('hotel.store') }} method="POST" enctype="multipart/form-data">
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
                <label class="form-label">Image</label>
                <input value="{{old('image') ?? ''}}" required name="image" accept=".png" type="file" class="form-control" id="" >
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