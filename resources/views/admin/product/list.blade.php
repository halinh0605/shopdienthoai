@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <h1>Product List</h1>
        <hr>
        <table class="tableView">
            <tr>
                <th>Id</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Gía (VNĐ)</th>
                <th>Danh mục</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            @foreach($data as $item)
            <tr>
                <td>{!! $item["idsp"] !!}</td>
                <td>{!! $item["tensp"] !!}</td>
                <td>{!! $item["soluong"] !!}</td>
                <td>{!! number_format($item["gia"],0,",",".") !!}</td>
                <td>
                    <?php $cat = DB::table('danhmuc')->where('madm',$item["madm"])->first();?>
                    @if(!empty($cat->tendm))
                        {!! $cat->tendm !!}
                        @endif
                </td>
                <td><i class="fa fa-trash-o fa-fw"><a href="{!! URL::route('admin.product.getDelete',$item['idsp']) !!}" onclick="return xacnhanxoa('Do you want to delete?')"> Delete</td>
                <td><i class="fa fa-pencil fa-fw"><a href="{!! url::route('admin.product.getEdit',$item["idsp"]) !!}"> Edit</td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection