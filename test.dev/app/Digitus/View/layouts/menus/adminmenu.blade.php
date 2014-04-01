<div id="sidebar" class="col-sm-3 col-md-2 sidebar" role="sidebar">
	<ul class="nav nav-sidebar nav-pills nav-stacked">
	    <li><a href="{{{ URL::route('admin.index') }}}" title="Admin Dashboard">Admin Dashboard</a></li>
	    <li><a href="{{{ URL::route('admin.blog.index') }}}" title="Blog overview">Blog overview</a></li>
	    <li><a href="{{{ URL::route('admin.blog.create') }}}" title="Create new Blogpost">Create new blogpost</a></li>
	    <li>{{ HTML::link('admin/blogposts', 'Blogpost Overview') }}</li>
	    <li></li>
	</ul>
</div>