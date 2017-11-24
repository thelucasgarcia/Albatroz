<table class="table table-responsive table-striped table-bordered" width="100%" id="datatable">
    <thead>
    
        <th>#</th>
        <th>Name</th>
        <th>Image</th>
        <th>Options</th>
    </thead>

    <tbody>
        @inject('countries', 'App\Models\Country')
        @foreach($countries->all() as $data)
            <tr>
                <td scope="row">{{ $data->id }}</td>
                <td>{{ $data->name }}</td>
                <td><img class="img-responsive" src="{{ asset('storage/country/'.$data->slug.'/'.$data->image) }}" width="100"></td>

                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.country.destroy', $data->id]]) !!}
                    <div class="">
                        <a class="btn btn-warning" href="{{ route('admin.country.edit', $data->id) }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <button type="submit" class="btn btn-danger" onclick='if (confirm("By confirming the registration will be deleted!")) { document.submit(); } event.returnValue = false; return false;' data-type='confirm'>
                            <i class="fa fa-times"></i>
                        </button>
                    </div>

                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        
    </tbody>
</table>