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
      <div class="container">
      <form action="{{ url('/search') }}" method="get">
        <input type="text" name="search" id="" style="color: black">
        <input type="submit" value="Search" class="btn btn-success">
      </form>

      <table class="table">
        <tr style="background-color: white; text-align:center">
          <td>Name</td>
          <td>Phone</td>
          <td>Address</td>
          <td>Foodname</td>
          <td>Price</td>
          <td>Quantity</td>
          <td>Total Price</td>
        </tr>

        @foreach ($data as $data)
          <tr style="text-align: center; background-color:white" >
            <td>{{ $data->name }}</td>
            <td>{{ $data->phone }}</td>
            <td>{{ $data->address }}</td>
            <td>{{ $data->foodname }}</td>
            <td>{{ $data->price }}Tk</td>
            <td>{{ $data->quantity }}</td>
            <td>
              {{ $data->price * $data->quantity}}Tk
            </td>
          </tr>
        @endforeach

      </table>
    </div>
    </div>
    @include('admin.adminscript')
  </body>
</html>