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
                            <h3 class="box-title">Student Fee Amount List</h3>
                            <a href=" {{ route('fee.amount.add') }}" style="float: right;"
                                class="btn btn-rounded btn-success mb-5">Add Fee Amount</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Fee Category</th>
                                            <th width="25%">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allData as $key => $amount)

                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $amount->name }}</td>
                                            {{-- <td>{{ $amount['fee_category']['name'] }}</td> --}}
                                            <td><a href="{{ route('fee.amount.edit',$amount->id)}}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ route('fee.amount.edit',$amount->id)}}"
                                                    class="btn btn-danger" id="delete">Delete</a>
                                                <a href="{{ route('fee.amount.details',$amount->id)}}"
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
