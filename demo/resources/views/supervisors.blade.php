@extends('layouts.main')
@section('content')
<h3>{{ isset($supervisor) ? 'Update supervisor' : 'Add supervisor' }}</h3>


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


<form method="post" action="{{ isset($supervisor) ? route('supervisors.update',$supervisor->id ) : route('supervisors.store') }}" >

    @csrf
    @if (isset($supervisor))
        @method('PUT')
    @endif
    

<div>
    <label>supervisor Name</label>
<input type="text" name="name" value="{{ isset($supervisor) ? $supervisor->name : '' }}" autocomplete="off" />
</div>

<br/>

<div>
<button type="submit" id = "Save">Save</button>
</div>

</form>

@if (isset($supervisor))

<hr/>

<form method="post" action="{{ route('supervisors.destroy', $supervisor->id) }}">

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
            <th>Theses</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($records as $record)
            <tr>
                <td>{{ $record->id }}</td>
                <td>{{ $record->name }}</td>
                <td>

                    @if (isset($record->thesis ))
                    @foreach ( $record->thesis as $item )
                        {{ $item->title }} <br>
                    @endforeach 
                 @endif
                </td>
                <td>
                    <a href="{{ route('supervisors.edit', $record->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif
@stop
