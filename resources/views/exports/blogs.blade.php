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
	@foreach($blog as $blogs)
		<tr>
			<td>{!! $blogs->id !!}</td>
			<td>{!! $blogs->blog_category ? $blogs->blog_category->name : "" !!}</td>
			<td>{!! $blogs->name !!}</td>
			<td>{!! $blogs->description !!}</td>
			<td>{!! $blogs->users->first_name !!}</td>
		</tr>
	@endforeach
	</tbody>
</table>