@extends('admin.admin_master')

@section('admin')





<div class="py-12">
    <div class="container">

        
        <div class="row">
            <div class="d-flex flex-row-reverse">
                <a class="pb-2" href="{{ route('add.contact') }}"><button class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                    <span>Add Contact</span>
                </button></a>

            </div>
            <div class="col-md-12">
            
                <div class="card">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card-header">All Contacts Data</div>
            
            
            
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Location</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($contacts as $var)
                            <tr>
                                <td width="5%" scope="row">{{ $loop->iteration }}</td>
                                <td width="25%">{{$var->location}}</td>
                                <td width="20%">{{$var->email}}</td>
                                <td width="20%">{{$var->phone}}</td>
                                
                                <td width="10%">
                                    @if($var->created_at == NULL)
                                    <span class="text-danger">Not available</span>
                                    @else
                                    {{ $var->created_at->diffForHumans()}}
                                    @endif
                                    
                                </td>
                                <td width="20%">
                                <a href="{{ url('admin/contact/edit/'.$var->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ url('admin/contact/delete/'.$var->id) }}"  onclick="return confirm('Are you sure want to delete this item?')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>

            
    </div>



</div>
@endsection
