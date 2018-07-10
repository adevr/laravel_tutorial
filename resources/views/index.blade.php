@extends('layouts.app')

@section('content')
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br/>
     @endif
      <a href="{{ route('create') }}" class="btn btn-success align-right"data-toggle="tooltip" title="Add Passport"><i class="fas fa-plus-square"></i></a>
      <a href="{{url('home')}}" class="btn btn-info align-right"data-toggle="tooltip" title="Get Back"><i class="fas fa-hand-point-left"></i></a>

    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Passport Office</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($passports as $passport)
      @php
        $date=date('Y-m-d', $passport['date']);
        @endphp
      <tr>
        <td>{{$passport['id']}}</td>
        <td>{{$passport['name']}}</td>
        <td>{{$date}}</td>
        <td>{{$passport['email']}}</td>
        <td>{{$passport['number']}}</td>
        <td>{{$passport['office']}}</td>
        
        <td><a href="{{action('PassportController@edit', $passport['id'])}}" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
        <td>
          <form action="{{action('PassportController@destroy', $passport['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit"><i class="fas fa-eraser"></i></button>
          </form>
        </td>
        <td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  @endsection