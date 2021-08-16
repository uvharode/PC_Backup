
<h2>Pending Users</h2>

<div class="table-responsive-sm">

    <table id="example1" class="table table-bordered table-striped">{{--Table start--}}
        @if(count($users) > 0 )


            <thead>
                <tr>
                    <th scope="col">first Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">isappoverd</th>
                    <th scope="col">Approve</th>
                    <th scope="col">Reject</th>

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
        <a href="{{ url('/updatestatus/'.$user->id)}}" class="btn btn-sm btn-primary">Approve</a>

        </td>
        <td>
            <a href="{{ url('/reject/'.$user->id)}}" class="btn btn-sm btn-danger">Reject</a>

            </td>
                </tr>


                    </tbody>


                    @endforeach


                    @else
                      <td class="pending">No Records found !!</td>



            @endif

                </table>
</div>
