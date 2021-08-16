
<h2>All Post</h2>


<div class="table-responsive-sm">
<table id="example1" class="table table-bordered table-striped" >{{--Table start--}}
   @if(count($users) > 0 )
        <thead>
               <tr>
                <th scope="col">first Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">text</th>
                <th scope="col">mulitimedia</th>
                <th scope="col">delete</th>
               </tr>
           </thead>

           <tbody>
               @foreach($users as $user)
               <tr>


              <td>{{  $user->firstname }}</td>
              <td>{{  $user->lastname }}</td>

              <td>{{$user->text == "undefined" ? " " : $user->text }}


                <td>

                 @if($user->type ==='jpeg' || $user->type ==='jpg' || $user->type ==='png')
                         <img src="{{ $user->multimedia  }}"
                            height="100px"
                           width="100px"
                           accept="image/*">


                          @elseif ($user->type ==='mp4'  || $user->type ==='3gp')
                               <video width="320" height="240" controls>
                         <source src="{{$user->multimedia }}" type="video/mp4" />
                            </video>


                         @elseif ($user->type ==='mp3')
                      <audio controls>
                      <source
                        src="{{ $user->multimedia  }}"
                         height="100px"
                         width="100px"
                       />
                        </audio>


                 @endif





                </td>

               <td>

                   <a href="{{ url('/deletePost/'.$user->id)}}" class="btn btn-sm btn-danger">Delete</a>

               </td>
               </tr>


            </tbody>


             @endforeach
              @else
                 <td class="pending">No Records found !!</td>
     @endif
</table>
</div>
