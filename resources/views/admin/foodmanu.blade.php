<x-app-layout>
    
</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.navbar')
      
      <div style="position: relative; top:60px; right:-100px">
        <form action="{{ url('/uploadfood') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div>
            <label for="">Title</label>
            <input style="color: #000" type="text" name="txtTitle" id="" placeholder="Write your product title">
          </div>
          <div>
            <label for="">Price</label>
            <input style="color: #000"  type="text" name="txtPrice" id="" placeholder="Write your product price">
          </div>
          <div>
            <label for="">Image</label>
            <input type="file" name="txtImage" id="" placeholder="Write your product image">
          </div>
          <div>
            <label for="">Description</label>
            <input  style="color: #000" type="text" name="txtDescription" id="" placeholder="Write your product description">
          </div>
          <div>
            <input style="color: #000" type="submit" value="Save">
          </div>
        </form>

        <div>
          <table class="table bg-white text-center" style="position: relative; top:60px; right: -60px">
            <tr>
              <th>Title</th>
              <th>Price</th>
              <th>Image</th>
              <th>Description</th>
              <th>Action</th>
              <th>Action Two</th>
            </tr>
            @foreach ($data as $data)
              <tr>
                <td>{{ $data->titls }}</td>
                <td>{{ $data->price }}</td>
                <td><img src="uploads/foods/{{ $data->image }}" alt="Foods Image"></td>
                <td>{{ $data->description }}</td>
                <td><a href="{{ url('/deletemanu', $data->id) }}">Delete</a></td>
                <td><a href="{{ url('/updateview', $data->id) }}">Update</a></td>
                
              </tr>
            @endforeach
            
          </table>
        </div>
      </div>
    </div>
      @include('admin.adminscript')
  </body>
</html>