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
                            <h3 class="box-title">Student Fee Amount Details</h3>

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Class Name</th>
                                                <th>Amount</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detailsData as $key => $data)

                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->amount }}</td>

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
