@extends('admin.template')

@section('content')
@section('content')
<div class="box box-primary">
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="card">
	                <div class="card-header" data-background-color="purple">
	                    <h4 class="title">All Contact Message</h4>
	                </div>
	                <div class="card-content table-responsive">
	                   
	                    <table class="table table-bordered table-hover"  id="table">	
	                        <thead class="text-primary">
	                        <th>ID</th>
	                        <th>Name</th>
	                        <th>Subject</th>
	                        <th>Sent At</th>
	                        <th>Action</th>
	                        </thead>
	                        <tbody>
	                            @foreach($contacts as $key=>$contact)
	                                <tr>
	                                    <td>{{ $key + 1 }}</td>
	                                    <td>{{ $contact->name }}</td>
	                                    <td>{{ $contact->subject }}</td>
	                                    <td>{{ $contact->created_at }}</td>
	                                    <td>
	                                        <a href="{{ route('contact.show',$contact->id) }}" class="btn btn-info btn-sm"><i class="material-icons">details</i></a>

	                                        <form id="delete-form-{{ $contact->id }}" action="{{ route('contact.destroy',$contact->id) }}" style="display: none;" method="POST">
	                                            @csrf
	                                            @method('DELETE')
	                                        </form>
	                                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
	                                            event.preventDefault();
	                                            document.getElementById('delete-form-{{ $contact->id }}').submit();
	                                        }else {
	                                            event.preventDefault();
	                                                }"><i class="material-icons">delete</i></button>
	                                    </td>
	                                </tr>
	                            @endforeach
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
  </div>
@endsection  
@section('js')
     <script>
        // dataTable
        $(document).ready(function() {
            $('#table').DataTable({
                //responsive: true,
                //scrollX: true,
                pageLength: 10,
                order: [[ 0, "desc" ]],
                lengthMenu: [ 2, 4, 10, 20, 50 ],
                columnDefs: [
                    { "orderable": false, "targets":4 }
                ]
            });
        });
    </script>
 @endsection 