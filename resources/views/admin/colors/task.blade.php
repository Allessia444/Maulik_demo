<select name="task" id="task" class="form-control">
<option>Select the task</option>}
	@foreach($task as $val)
	<option value="{!! route('get-task',$val->id) !!}">{!! $val->name !!}</option>
	@endforeach
</select>