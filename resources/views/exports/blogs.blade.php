
<table>
	<thead>
	<tr>
		<th>Id</th>
		<th>BlogCategoryId</th>
		<th>Name</th>
		<th>Description</th>
		<th>UserId</th>
	</tr>
	</thead>
	<tbody>
	@foreach($blog as $key=>$blogs)
		<tr>
			<td>{!! $blogs->id !!}</td>
			<td>{!! $blogs->blog_category ? $blogs->blog_category->name : "" !!}</td>
			<td>{!! $blogs->name !!}</td>
			<td>{!! $blogs->description !!}</td>
			<td @if($key >=0 AND $key < 5 )style="background-color: #00FFFF" @else  style="background-color: #FFB6C1" @endif>{!! $blogs->users->first_name !!}</td>
		</tr>
	@endforeach
	</tbody>
</table>
<!-- {!! $key >0 AND $key < 5 ? 'pink' : 'blue' !!} -->