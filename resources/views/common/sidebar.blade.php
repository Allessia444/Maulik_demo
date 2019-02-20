	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<img src="{!! asset('images/deskapp-logo.png') !!}" alt="">
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
			<ul id="accordion-menu">
				@if(Auth::user()->role == "admin")
				<li>
					<a href="{!! route('home') !!}" class="dropdown-toggle no-arrow">
						<span class="fa fa-home"></span><span class="mtext">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="{!! route('designations.index') !!}" class="dropdown-toggle no-arrow">
						<span class="fa fa-home"></span><span class="mtext">Designations</span>
					</a>
				</li>

				<li>
					<a href="{!! route('departments.index') !!}" class="dropdown-toggle no-arrow">
						<span class="fa fa-pencil"></span><span class="mtext">Departments</span>
					</a>
				</li>
				<li>
					<a href="{!! route('users.index') !!}" class="dropdown-toggle no-arrow">
						<span class="fa fa-table"></span><span class="mtext">Users</span>
					</a>
				</li>
				<li>
					<a href="{!! route('industrys.index') !!}" class="dropdown-toggle no-arrow">
						<span class="fa fa-desktop"></span><span class="mtext">Industrys</span>
					</a>
				</li>
				<li>
					<a href="{!! route('clients.index') !!}" class="dropdown-toggle no-arrow">
						<span class="fa fa-sitemap"></span><span class="mtext">Clients</span>
					</a>
				</li>
				<li>
					<a href="{!! route('taskcategories.index') !!}" class="dropdown-toggle no-arrow">
						<span class="fa fa-plug"></span><span class="mtext">Task_categories</span>
					</a>
				</li>
				<li>
					<a href="{!! route('projects.index') !!}" class="dropdown-toggle no-arrow">
						<span class="fa fa-clone"></span><span class="mtext">Projects</span>
					</a>
				</li>
				<li>
					<a href="{!! route('projectcategories.index') !!}" class="dropdown-toggle no-arrow">
						<span class="fa fa-list"></span><span class="mtext">Project_categories</span>
					</a>
				</li>
					
				<li>
					<a href="{!! route('blogcategories.index') !!}" class="dropdown-toggle no-arrow">
						<span class="fa fa-pencil"></span><span class="mtext">Blog_categories</span>
					</a>
				</li>
				
				@endif
				@if(Auth::user()->role == "user")

				<li>
					<a href="{!! route('editprofile') !!}" class="dropdown-toggle no-arrow">
						<span class="fa fa-pencil"></span><span class="mtext">Profile</span>
					</a>
				</li>
				@endif
				<li>
					<a href="{!! route('blogs.index') !!}" class="dropdown-toggle no-arrow">
						<span class="fa fa-pencil"></span><span class="mtext">Blogs</span>
					</a>
				</li>
			</ul>
			

			</div>
		</div>
	</div>