<br>
<div class="form-group{{ $errors->has('newcategory') ? ' has-error' : '' }}">
    {!! Form::label('newcategory', 'New Category') !!}
    {!! Form::text('newcategory', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('newcategory') }}</small>
</div>

<button type="button" class="btn btn-default btn-sm" onclick="createCategory()">Add New Category</button>

<script>
	function createCategory() {

        var category = $('#newcategory');
        var csrftoken = '{{ csrf_token() }}';
        console.log(category);
        if (category) {
            $.ajax({
                type: "POST",
                url: '{{ route('admin.blog.category.store') }}',
                data: { 
                    _token:      csrftoken, 
                    newcategory: category.val()
                },
                success: function( data ) {
                    $('#category').append("<option selected value=" + data.id + ">" + data.name + "</option>");
                    category.val('');
                },
            });
        }
         
    }
</script>