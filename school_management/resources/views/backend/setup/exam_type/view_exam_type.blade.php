@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Exam Type List</h3>
                            <a href=" {{ route('exam.type.add') }}" style="float: right;"
                                class="btn btn-rounded btn-success mb-5">Add Exam Type</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Exam Type</th>
                                            <th width="25%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allData as $key => $type)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $type->name }}</td>
                                            {{-- <td>{{ $amount['fee_category']['name'] }}</td> --}}
                                            <td><a href="{{ route('exam.type.edit',$type->id)}}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ route('exam.type.edit',$type->id)}}"
                                                    class="btn btn-danger" id="delete">Delete</a>
                                                <a href="{{ route('exam.type.details',$type->id)}}"
                                                    class="btn btn-primary" id="details">Details</a>
                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot> --}}
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
</div>



@endsection
