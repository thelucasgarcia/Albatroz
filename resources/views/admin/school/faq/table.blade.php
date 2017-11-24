<!-- /.box-header -->
<div class="box-body">
    <div class="box-group" id="accordion">
        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
        @foreach($school->faq as $faq)
        <div class="panel box box-solid box-primary">
            <div class="box-header with-border">
                <h4 class="box-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $faq->id }}" aria-expanded="false" class="collapsed">
                    {{ $faq->question }}</a>
                </h4>
                <div class="box-tools pull-right">

                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.school.faq.destroy', $faq->id]]) !!}
                    <div class="btn-group-sm">

                        <button type="submit" class="btn btn-danger" onclick='if (confirm("By confirming the registration will be deleted!")) { document.submit(); } event.returnValue = false; return false;' data-type='confirm'>
                            <i class="fa fa-times"></i>
                        </button>
                        
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
            <div id="collapse{{ $faq->id }}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="box-body">
                    {{$faq->answer}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- /.box-body -->