@extends('layouts.app')

@section('title','HOME')

@section('content')


<script type="text/javascript">
    function reloadPage() {
        location.reload();
    }
    function acceptRequest(id, token) {
        var http = new XMLHttpRequest();
        var url = 'http://127.0.0.1:8000/acceptRequest/'+id+'/';
        var params = 'id='+id;
        http.open('GET', url);

        console.log(id);
        //Send the proper header information along with the request
        http.setRequestHeader('X-CSRF-TOKEN', token);
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        

        http.onreadystatechange = function() {//Call a function when the state changes.
            if(http.readyState == 4 && http.status == 200) {
                if(http.responseText == 1){
                    Swal.fire(
                          'Success!',
                          'This user was added.',
                          'success',
                          {onAfterClose: 'reloadPage()'}
                        );
                }
                else{
                    Swal.fire({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Something went wrong!'
                      
                    });
                }
                //location.reload();
            }
        }
        http.send(params);
    }


    function acceptRequest(id, token) {
        var http = new XMLHttpRequest();
        var url = 'http://127.0.0.1:8000/acceptRequest/'+id+'/';
        var params = 'id='+id;
        http.open('GET', url);

        console.log(id);
        //Send the proper header information along with the request
        http.setRequestHeader('X-CSRF-TOKEN', token);
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        

        http.onreadystatechange = function() {//Call a function when the state changes.
            if(http.readyState == 4 && http.status == 200) {
                if(http.responseText == 1){
                    Swal.fire(
                          'Success!',
                          'This user was added.',
                          'success',
                          {onAfterClose: 'reloadPage()'}
                        );
                }
                else{
                    Swal.fire({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Something went wrong!',
                      onAfterClose: 'reloadPage()'
                    });
                }
                location.reload();
            }
        }
        http.send(params);
    }

    function rejectRequest(id, token) {
        var http = new XMLHttpRequest();
        var url = 'http://127.0.0.1:8000/rejectRequest/'+id+'/';
        var params = 'id='+id;
        http.open('GET', url);

        console.log(id);
        //Send the proper header information along with the request
        http.setRequestHeader('X-CSRF-TOKEN', token);
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        

        http.onreadystatechange = function() {//Call a function when the state changes.
            if(http.readyState == 4 && http.status == 200) {
                if(http.responseText == 1){
                    Swal.fire(
                          'Success!',
                          'This user was added.',
                          'success',
                          {onAfterClose: 'reloadPage()'}
                        );
                }
                else{
                    Swal.fire({
                      type: 'error',
                      title: 'Oops...',
                      text: 'Something went wrong!',
                      onAfterClose: 'reloadPage()'
                    });
                }
                location.reload();
            }
        }
        http.send(params);
    }
</script>

<div class="container m-t-100 m-b-100">





    






    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fs-22">Your Teams</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($teams as $team)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>team Name</th>
                                <th>domain</th>
                                <th>req</th>
                                <th>contact</th>
                                <th>location</th>
                                <th>time</th>
                                <th>date</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                
                                <tr>
                                    <td>{{ $team->event }}</td>
                                    <td>{{ $team->domain }}</td>
                                    <td>{{ $team->requirements }}</td>
                                    <td>{{ $team->contact_no }}</td>
                                    <td>{{ $team->location }}</td>
                                    <td>{{ $team->time }}</td>
                                    <td>{{ $team->date }}</td>
                                    
                                    <td><a href="/updateTeam/{{$team->id}}">Update</a>
                            
                        </tbody>
                    </table>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($team->registrations as $reg)            
                            <tr>
                                
                                <td>{{ $reg->name }}</td>
                                <td>{{ $reg->status }}</td>
                                @if($reg->status == 'Pending')
                                <td><button onclick="acceptRequest('{{$reg->id}}, {{csrf_token()}}');">Accept</button></td>
                                <td><button onclick="rejectRequest('{{$reg->id}}, {{csrf_token()}}');">Reject</button></td>
                                @endif
                                @if($reg->status == 'Accepted')
                                <td><button disabled onclick="acceptRequest('{{$reg->id}}, {{csrf_token()}}');">Accept</button></td>
                                <td><button onclick="rejectRequest('{{$reg->id}}, {{csrf_token()}}');">Reject</button></td>
                                @endif
                                @if($reg->status == 'Rejected')
                                <td><button onclick="acceptRequest('{{$reg->id}}, {{csrf_token()}}');">Accept</button></td>
                                <td><button disabled onclick="rejectRequest('{{$reg->id}}, {{csrf_token()}}');">Reject</button>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                    @endforeach

                    <p>Teams you have requested</p>

                    @foreach ($yourRequestedTeams as $team)

                    <table class="table">
                        <thead>
                            <tr>
                                <th>team Name</th>
                                <th>domain</th>
                                <th>contact</th>
                                <th>location</th>
                                <th>time</th>
                                <th>date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                
                                <tr>
                                    <td>{{ $team->event }}</td>
                                    <td>{{ $team->domain }}</td>
                                    <td>{{ $team->contact_no }}</td>
                                    <td>{{ $team->location }}</td>
                                    <td>{{ $team->time }}</td>
                                    <td>{{ $team->date }}</td>
                                    <td>{{ $team->status }}</td>
                                    
                            
                        </tbody>
                    </table>

                    @endforeach
                    <div class="links">
                        <a href="/teamBuild">Add New team</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
