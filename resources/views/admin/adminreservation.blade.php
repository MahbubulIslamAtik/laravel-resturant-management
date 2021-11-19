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
        <div>
          <table class="table bg-white text-center" style="position: relative; top:60px; right: -60px">
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Guest</th>
              <th>Date</th>
              <th>Time</th>
              <th>Message</th>
              <th>Action</th>
            </tr>

            @foreach ($data2 as $data2)
              <tr>
                <td>{{ $data2->name }}</td>
                <td>{{ $data2->email }}</td>
                <td>{{ $data2->phone }}</td>
                <td>{{ $data2->guest }}</td>
                <td>{{ $data2->date }}</td>
                <td>{{ $data2->time }}</td>
                <td>{{ $data2->message }}</td>
                <td><a href="{{ url('/deletereservation', $data2->id) }}">Delete</a></td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
      @include('admin.adminscript')
  </body>
</html>