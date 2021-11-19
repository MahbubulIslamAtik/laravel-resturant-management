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
        <form action="{{ url('/updatefoodchef', $data->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          <div>
            <label for="">Name</label>
            <input style="color: #000" type="text" name="name" value="{{ $data->name }}" required>
          </div>
          <div>
            <label for="">Speciality</label>
            <input style="color: #000"  type="text" name="speciality" value="{{ $data->speciality }}" required>
          </div>
          <div>
            <label for="">Old Image</label>
            <img style="width:200px; height:200px" src="uploads/chefs/{{ $data->image }}" alt="">
          </div>

          <div>
            <label for="">New Image</label>
            <input type="file" name="image" id="">
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


