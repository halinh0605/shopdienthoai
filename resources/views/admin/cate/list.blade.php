@extends('admin.layouts.master')
@section('content')
<div class="container">
	<h1>Category List</h1>
	<hr>
	<table class="tableView">
			<tr>
				<th>Id</th>
				<th>Tên danh mục</th>
				<th>Từ khóa</th>
				<th>Mô tả</th>
				<th>Delete</th>
				<th>Edit</th>
			</tr>
		@foreach($cat as $item)
			<tr>
				<td>{!! $item["madm"] !!}</td>
				<td>{!! $item["tendm"] !!}</td>
				<td>{!! $item["tukhoa"] !!}</td>
				<td>{!! $item["mota"] !!}</td>
				<td><a href="#">Delete</td>
				<td><a href="#">Edit</td>
			</tr>
			@endforeach
	</table>
</div>
@endsection
