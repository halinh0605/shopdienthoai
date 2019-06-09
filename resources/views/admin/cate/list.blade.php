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
				<th>Hành động</th>

			</tr>
		@foreach($dm as $item)
			<tr>
				<td>{!! $item["madm"] !!}</td>
				<td>{!! $item["tendm"] !!}</td>
				<td>{!! $item["tukhoa"] !!}</td>
				<td>{!! $item["mota"] !!}</td>
				<td><a  class="fa fa-trash fa-fw" href="{!! URL('admin/cate/delete/'.$item["madm"]) !!}" onclick="return xacnhanxoa('Do you want to delete?')"> <a class="fa fa-pencil fa-fw" href="{!! url('admin/cate/edit'.$item["madm"]) !!}"> </td>
			</tr>
			@endforeach
	</table>
</div>
@endsection
