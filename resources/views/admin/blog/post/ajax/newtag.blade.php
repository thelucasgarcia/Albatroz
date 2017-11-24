<br>
<div class="form-group{{ $errors->has('newtag') ? ' has-error' : '' }}">
    {!! Form::label('newtag', 'New Tag') !!}
    {!! Form::text('newtag', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('newtag') }}</small>
</div>

<button type="button" class="btn btn-default btn-sm" onclick="createTag()">Add New Tag</button>

<script>
	function createTag() {

        var tag = $('#newtag');
        var csrftoken = '{{ csrf_token() }}';
        console.log(tag);
        if (tag) {
            $.ajax({
                type: "POST",
                url: '{{ route('admin.blog.tag.store') }}',
                data: { 
                    _token:      csrftoken, 
                    newtag: tag.val()
                },
                success: function( data ) {
                    $('#tags').append("<option selected value=" + data.id + ">" + data.name + "</option>");
                    tag.val('');
                },
            });
        }
         
    }
</script>