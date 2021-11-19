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
        <form action="{{ url('/uploadchef') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div>
            <label for="">Name</label>
            <input style="color: #000" type="text" name="name" required>
          </div>
          <div>
            <label for="">Speciality</label>
            <input style="color: #000"  type="text" name="speciality" required>
          </div>
          <div>
            <label for="">Image</label>
            <input type="file" name="image" id="" placeholder="Write your product image">
          </div>
          <div>
            <input style="color: #000" type="submit" value="Save">
          </div>
        </form>

        <div>
          <table class="table bg-white text-center" style="position: relative; top:60px; right: -60px">
            <tr>
              <th>Chef Name</th>
              <th>Speciality</th>
              <th>Image</th>
              <th>Action</th>
              <th>Action Two</th>
            </tr>
            @foreach ($data as $data)
              <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->speciality }}</td>
                <td><img src="uploads/chefs/{{ $data->image }}" alt="Chef Image"></td>
                <td><a href="{{ url('/deletechef', $data->id) }}">Delete</a></td>
                <td><a href="{{ url('/updatechef', $data->id) }}">Update</a></td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
      @include('admin.adminscript')
  </body>
</html>