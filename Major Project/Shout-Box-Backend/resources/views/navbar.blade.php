<nav class="navbar navbar-expand-sm navbar-dark w-100">
    <a class="navbar-brand logo">Shout Box</a>
    <button class="navbar-toggler collapsed"  type="button"
    data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" id="btnss"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav mr-auto">
    <a class="nav-item nav-link active " href="{{url('/home')}}">Home <span class="sr-only">(current)</span></a>  <!-- <a class="nav-item nav-link active" href="{{url('/users')}}"> Pending Users </a> -->
    <a class="nav-item nav-link" href="{{url('/getAllloginUsers')}}"> Approved Users </a>

    <a class="nav-item nav-link" href="{{url('/getReportedShouts')}}"> Reported Shouts </a>
    <a class="nav-item nav-link" href="{{url('/getAllPosts')}}"> All Shouts </a>
    <a class="nav-item nav-link" href="{{url('/logout')}}"> LogOut </a>
     </div>
    </div>
    </nav>
