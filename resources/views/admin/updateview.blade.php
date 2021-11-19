<x-app-layout>
    
</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.navbar')
      <div style="position: relative; top:60px; right:-100px">
        <form action="{{ url('/update', $data->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div>
            <label for="">Title</label>
            <input style="color: #000" type="text" name="txtTitle" id="" value="{{ $data->titls }}" required>
          </div>
          <div>
            <label for="">Price</label>
            <input style="color: #000"  type="text" name="txtPrice" id=""value="{{ $data->price }}" required>
          </div>
          <div>
            <label for="">Old Image</label>
            <img src="uploads/foods/{{ $data->image }}" alt="">
          </div>
          <div>
            <label for="">Image</label>
            <input type="file" name="txtImage" id="" placeholder="Write your product image">
          </div>
          <div>
            <label for="">Description</label>
            <input  style="color: #000" type="text" name="txtDescription" id=""value="{{ $data->description }}" required>
          </div>
          <div>
            <input style="color: #000" type="submit" value="Update">
          </div>
        </form>
      </div>
    </div>
    @include('admin.adminscript')
  </body>
</html>