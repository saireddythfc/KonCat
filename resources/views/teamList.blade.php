@extends('layouts.app')

@section('title','HOME')

@section('content')
<script type="text/javascript">

    
    window.onload = function() {

        /*Swal.fire({
          title: 'Error!',
          text: 'Do you want to continue',
          type: 'error',
          confirmButtonText: 'Cool'
        });*/
    };

    function update() {
        sel = document.getElementById('selectedDomain');
        //console.log(sel.value);

        var table = document.getElementById("mytab1");
        for (var i = 1, row; row = table.rows[i]; i++) {
            //console.log(row.classList.contains(sel.value));
            if(sel.value == "Any")
                row.style.display = "";
            else if(row.classList.contains(sel.value))
                row.style.display = "";
            else 
                row.style.display = "none";
        }

        var checkBox = document.getElementById('sortByDateCheckBox');
        if(!checkBox.checked)
            return true;

        var start = Date.parse(document.getElementById('startDate').value);
        var end = Date.parse(document.getElementById('endDate').value);
        console.log(start);
        if(isNaN(start) || isNaN(end))
            return true;

        if(end < start){
            Swal.fire({
                title: 'Error!',
                text: 'End date should be lesser than start date.',
                type: 'error',
                confirmButtonText: "Okay i'm dumb"
            });
            document.getElementById('endDate').value = '';
        }

        for (var i = 1, row; row = table.rows[i]; i++) {
            date = row.cells[8].innerHTML;
            current = Date.parse(date);
            current += 19800000;
            console.log(current);
            if(!(current >= start && current <= end)) 
                row.style.display = "none";
        }
    }


    function showSortByDate() {
        var dateDiv = document.getElementById('showSortByDate');
        var checkBox = document.getElementById('sortByDateCheckBox');

        if(checkBox.checked)
            dateDiv.style.display = "block";
        else
            dateDiv.style.display = "none";
        update();
    }

    


</script>

<p>Showing for location:</p> {{$location}}

<div class="container m-t-100 m-b-100">

    <div class="form-group row">

        <label for="selectedDomain" class="col-md-4 col-form-label text-md-right">Domain</label>

        <div class="col-md-6">
                
            <select id="selectedDomain" class="form-control" name="selectedDomain" onChange="update();">
                <option>Any</option>
                <option value="TECHNICAL">Technical</option>
                <option value="CULTURAL">Cultural</option>
                <option value="SPORT">Sport</option>
            </select>
        </div>
    </div>


    <div class="form-group row">

        <label for="sortByDateCheckBox" class="col-md-4 col-form-label text-md-right">Find by date?</label>

        <div class="col-md-6">
                
            <input type="checkbox" id="sortByDateCheckBox" name="sortByDateCheckBox" class="col-md-4 col-form-label text-md-right" onclick="showSortByDate();">
        </div>
    </div>


    <div class="form-group row" id="showSortByDate" style="display: none;">

        <label for="startDate" class="col-md-4 col-form-label text-md-right" >Start date</label>
        <input type="date" name="startDate" id="startDate" onChange="update();">
        
        <label for="endDate" class="col-md-4 col-form-label text-md-right" onChange="update();">End date</label>
        <input type="date" name="endDate" id="endDate" onChange="update();">
    </div>

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
                    <table class="table" id="mytab1">
                        <thead>
                            <tr>
                                <th>Event Name</th>
                                <th>Description</th>
                                <th>domain</th>
                                <th>req</th>
                                <th>contact</th>
                                <th>location</th>
                                <th>time</th>
                                <th>date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                                
                                <tr class="{{$team->domain}}">
                                    <td>{{ $team->event }}</td>
                                    <td>{{ $team->description }}</td>
                                    <td>{{ $team->domain }}</td>
                                    <td>{{ $team->requirements }}</td>
                                    <td>{{ $team->contact_no }}</td>
                                    <td>{{ $team->location }}</td>
                                    <td>{{ $team->time }}</td>
                                    <td>{{ $team->date }}</td>
                                    <td style="display: none"><?php $dateTime = DateTime::createFromFormat('Y-m-d', $team->date);
echo $dateTime->format('m/d/Y'); ?></td>
                                    
                                    <td><a href="/requestTeam/{{$team->id}}">Request</a>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- <div class="links">
                        <a href="/addNewteam">Add New team</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
