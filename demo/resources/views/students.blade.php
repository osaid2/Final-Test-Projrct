@extends('layouts.main')
@section('content')
<h3>{{ isset($student) ? 'Update Student' : 'Add Student' }}</h3>


@if (Session::has('succ'))
<div style="color:#0d0">    
{{ Session::get('succ') }}
</div>
@endif


@if (count($errors))
<div style="color:#f00">
    @foreach ($errors->all() as $error)
        {{ $error }}<br/>
    @endforeach
</div>
@endif


<form method="post" action="{{ isset($student) ? route('students.update',$student->id ) : route('students.store') }}" >

    @csrf
    @if (isset($student))
        @method('PUT')
    @endif
    

<div>
    <label>Student Name</label>
<input type="text" name="name" value="{{ isset($student) ? $student->name : '' }}" autocomplete="off" />
</div>

<br/>

<div>
<button type="submit" id = "Save">Save</button>
</div>

</form>

@if (isset($student))

<hr/>

<form method="post" action="{{ route('students.destroy', $student->id) }}">

    @csrf
    @method('Delete')

    <button type="submit">Delete</button>

</form>
@endif


@if(isset($records))
<table border="1" width="350px">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($records as $record)
            <tr>
                <td>{{ $record->id }}</td>
                <td>{{ $record->name }}</td>
                <td>
                    <a href="{{ route('students.edit', $record->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif

@stop