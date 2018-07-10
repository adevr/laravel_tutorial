@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Edit A Form</h2><br  />
      <a href="{{url('passports')}}" class="btn btn-info"><i class="fas fa-hand-point-left"></i></a>
        <form method="post" action="{{action('PassportController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{$passport->name}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" value="{{$passport->email}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="number">Phone Number:</label>
              <input type="text" class="form-control" name="number" value="{{$passport->number}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-left:38px">
                <lable>Passport Office</lable>
                <select name="office">
                  <option value="Mumbai"  @if($passport->office=="Mumbai") selected @endif>Mumbai</option>
                  <option value="Chennai"  @if($passport->office=="Chennai") selected @endif>Chennai</option>
                  <option value="Delhi" @if($passport->office=="Delhi") selected @endif>Delhi</option>  
                  <option value="Bangalore" @if($passport->office=="Bangalore") selected @endif>Bangalore</option>
                </select>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
          </div>
        </div>
      </form>
    </div>
 @endsection