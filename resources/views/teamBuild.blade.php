@extends('layouts.app')

@section('content')
<!-- {{$user_id}} -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Build a team</div>

                <div class="card-body">
                    <form method="POST" action="/processTeam">
                        @csrf

                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">User id</label>

                            <div class="col-md-6">
                                <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ $user_id }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="domain" class="col-md-4 col-form-label text-md-right">Domain</label>

                            <div class="col-md-6">
                                <!-- <input id="domain" type="text" class="form-control" name="domain" required autofocus> -->

                                <select id="domain" class="form-control" name="domain" required autofocus>
                                    
                                    <option value="">- Select a Domain -</option>
                                    <option value="SPORT">- Sport -</option>
                                    <option value="TECHNICAL">- Technical -</option>
                                    <option value="CULTURAL">- Cultural -</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="event" class="col-md-4 col-form-label text-md-right">Event</label>

                            <div class="col-md-6">
                                <input id="event" type="text" class="form-control" name="event" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">Date</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-md-4 col-form-label text-md-right">Time</label>

                            <div class="col-md-6">
                                <input id="time" type="time" class="form-control" name="time" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">Location</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="{{ $location }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact_no" class="col-md-4 col-form-label text-md-right">Contact no</label>

                            <div class="col-md-6">
                                <input id="contact_no" type="text" class="form-control" name="contact_no" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="requirements" class="col-md-4 col-form-label text-md-right">Requirements</label>

                            <div class="col-md-6">
                                <input id="requirements" type="text" class="form-control" name="requirements" required autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Build
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection