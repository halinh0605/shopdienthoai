@extends('admin.layouts.master')
@section('content')
<div class="container">
	<h1>Danh sách danh mục sản phẩm</h1>
	<hr>
	<table class="tableView">
			<tr>
				<th>Id</th>
				<th>Tên danh mục</th>
				<th>Hành động</th>

			</tr>
		@foreach($cat as $item)
			<tr>
				<td>{!! $item["madm"] !!}</td>
				<td>{!! $item["tendm"] !!}</td>
				<td><a  class="fa fa-pencil fa-fw" href="{!! URL::route('admin.cate.getEdit',$item["madm"]) !!}" /> </td>
			</tr>
			@endforeach
	</table>
</div>
@endsection
