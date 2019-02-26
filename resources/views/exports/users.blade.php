<table>
	<thead>
		<tr>
			<th>Id</th>
			<th>FirstName</th>
			<th>LastName</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Designation</th>
			<th>Department</th>
			<th>Mobile</th>
			<th>Address1</th>
			<th>Address2</th>
			<th>City</th>
			<th>State</th>
			<th>Country</th>
			<th>Zipcode</th>
			<th>Dateofbirth</th>
			<th>Gender</th>
			<th>Pan number</th>
			<th>ManagemenLevel</th>
			<th>JoinDate</th>
			<th>Google</th>
			<th>Facebook</th>
			<th>Website</th>
			<th>Skype</th>
			<th>Linkedin</th>
			<th>Twitter</th>

		</tr>
	</thead>
	<tbody>
	@foreach($users as $user)
		<tr>
			<td>{!! $user->id !!}</td>
			<td>{!! $user->first_name !!}</td>
			<td>{!! $user->last_name !!}</td>
			<td>{!! $user->email !!}</td>
			<td>{!! $user->phone !!}</td>
			<td>{!! $user->designations->name !!}</td>
			<td>{!! $user->departments->name !!}</td>
			<td>{!! $user->user_profile->mobile !!}</td>
			<td>{!! $user->user_profile->address1 !!}</td>
			<td>{!! $user->user_profile->address2 !!}</td>
			<td>{!! $user->user_profile->city !!}</td>
			<td>{!! $user->user_profile->state !!}</td>
			<td>{!! $user->user_profile->country !!}</td>
			<td>{!! $user->user_profile->zipcode !!}</td>
			<td>{!! $user->user_profile->dob !!}</td>
			<td>{!! $user->user_profile->gender !!}</td>
			<td>{!! $user->user_profile->pan_number !!}</td>
			<td>{!! $user->user_profile->management_level !!}</td>
			<td>{!! $user->user_profile->join_date !!}</td>
			<td>{!! $user->user_profile->google !!}</td>
			<td>{!! $user->user_profile->facebook !!}</td>
			<td>{!! $user->user_profile->website !!}</td>
			<td>{!! $user->user_profile->skype !!}</td>
			<td>{!! $user->user_profile->linkedin !!}</td>
			<td>{!! $user->user_profile->twitter !!}</td>
		</tr>
		@endforeach	
	</tbody>
</table>