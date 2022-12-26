@extends('layouts.main')
@section('content')
<h3>{{ isset($category) ? 'Update category' : 'Add category' }}</h3>


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


<form method="post" action="{{ isset($category) ? route('categories.update',$category->id ) : route('categories.store') }}" >

    @csrf
    @if (isset($category))
        @method('PUT')
    @endif
    

<div>
    <label>category Name</label>
<input type="text" name="name" value="{{ isset($category) ? $category->name : '' }}" autocomplete="off" />
</div>

<br/>

<div>
<button type="submit"  id = "Save">Save</button>
</div>

</form>

@if (isset($category))

<hr/>

<form method="post" action="{{ route('categories.destroy', $category->id) }}">

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
                    <a href="{{ route('categories.edit', $record->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif

@stop