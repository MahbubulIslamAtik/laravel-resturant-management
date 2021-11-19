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
            <th>Action</th>
          </tr>
          @foreach($user as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              @if($user->usertype==="0")
              <td><a href="{{ url('/deleteusers', $user->id) }}">Delete</a></td>
              @else
              <td style="color:red"><a>Not allowed</a></td>
              @endif
            </tr>
          @endforeach
        </table>
      </div>
    </div>
    
    @include('admin.adminscript')
  </body>
</html>