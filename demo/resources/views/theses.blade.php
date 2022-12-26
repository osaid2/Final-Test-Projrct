
@extends('layouts.main')
@section('content')
<h3>{{ isset($thesis) ? 'Update thesis' : 'Add thesis' }}</h3>

@if (Session::has('succ'))
<div style="color:#0d0">
    {{ Session::get('succ') }}
</div>
@endif

@if (count($errors))
    <div style="color: #F00">
    @foreach ($errors->all() as $error)
        {{ $error }}<br/>
    @endforeach
    </div>
@endif
<form method="post" action="{{ isset($thesis) ? route('theses.update',$thesis->id ) : route('theses.store') }}">

    @csrf
    @if (isset($thesis))
    @method('PUT')
@endif
    <div>
        <label>Title</label><br/>
        <input type="text" name="title"     value="{{ isset($thesis) ? $thesis->title : '' }}" autocomplete="off" />
    
    </div>

    
    <div>
        <label>Description</label><br/>
        <textarea name="description" value="{{ isset($thesis) ? $thesis->description : '' }}"></textarea>
    </div>

   
    <div>
        <label>Date</label><br/>
        <input type="text" name="date" value="{{ isset($thesis) ? $thesis->date : '' }}" autocomplete="off" />
    </div>

    
    <div>
        <label>Category</label><br/>
   
       <select name="category_id" id="">
<option value="">Choose</option>
@foreach ($categories as $item )
 <option value="{{ $item->id }}">{{ $item->name }}</option>   
@endforeach

       </select>
    </div>

    
    <div>
        <label>Student</label><br/>
     
        <select name="student_id" id="">
 <option value="">Choose</option>
 @foreach ($students as $item )
  <option value="{{ $item->id }}">{{ $item->name }}</option>   
 @endforeach
 
        </select> 
       </div>
        <hr>
        <div>
            <input type="checkbox" name="active" >Active</div>
    <div>
        @foreach ($supervisors as $item )
        <input type="checkbox" name="supervisor_ids[]" value="{{ $item->id }}">{{ $item->name }}  <br>
       
      
       {{-- {{ $item->id }} {{ $item->name }} <br> --}}
       @endforeach
    </div>


    <br/>
    <hr>
    <button type="submit" >Save</button>

</form>

@if (isset($thesis))

<hr/>

<form method="post" action="{{ route('theses.destroy', $thesis->id) }}">

    @csrf
    @method('Delete')

    <button type="submit">Delete</button>

</form>
@endif







@if (isset($records))
    <table border="1" width="350px">
        <thead>
            <tr>
                <td>ID</td>    
                <td>Title</td>    
                <td>Date</td>    
                <td>Student</td> 
                <td>Category</td>           
                <td>Active</td>    
                <td>Supervisor</td>
                <td>EDIT</td>
                  
            </tr>
    </thead>

        <tbody>
            @foreach ($records as $rec)
                <tr>
                    <td>{{ $rec->id }}</td>
                    <td>{{ $rec->title }}</td>
                    <td>{{ $rec->date }}</td>
                    <td>{{ isset($rec->student) ? $rec->student->name : '-' }}</td>
                    <td>{{ isset($rec->category) ? $rec->category->name : '-'}}</td>
                    <td>{{ $rec->active }}</td>
                    <td>
                        @if (isset($rec->supervisor ))
                        @foreach ($rec->supervisor as $item )
                            {{ $item->name }} 
                        @endforeach 
                     @endif
                    </td>
                
                     <td> 
                     
                         <a href=" {{ route('theses.edit', $rec->id) }}">Edit</a> 

                     </td> 
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@stop