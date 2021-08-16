<h2>Approved Users</h2>


<div class="table-responsive-sm">
    <table id="example1" class="table table-bordered table-striped">{{--Table start--}}
        @if(count($users) > 0 )


            <thead>
                <tr>
                    <th scope="col">first Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">isappoverd</th>
                    <th scope="col">delete</th>

                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr>

                    <td>{{  $user->firstname }}</td>
                    <td>{{  $user->lastname }}</td>
                    <td>{{  $user->role }}</td>
                    <td>{{  $user->isapproved }}</td>

                    <td>
                        <a href="{{ url('/deleteUser/'.$user->id)}}" class="btn btn-sm btn-danger">Delete</a>

                        </td>
                </tr>


                    </tbody>


                    @endforeach


                    @else
                      <td class="pending">No Records found !!</td>



            @endif

                </table>
</div>               
