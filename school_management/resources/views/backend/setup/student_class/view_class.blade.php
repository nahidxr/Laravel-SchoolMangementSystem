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
                            <h3 class="box-title">Student Class List</h3>
                            <a href=" {{ route('student.class.add') }}" style="float: right;"
                                class="btn btn-rounded btn-success mb-5">Add Student Class</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                {{-- <div class="table-data"> --}}
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Name</th>
                                            <th width="25%">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allData as $key => $student)

                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td><a href="{{ route('student.class.edit',$student->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ route('student.class.delete',$student->id) }}"
                                                    class="btn btn-danger" id="delete">Delete</a>
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

                                {!! $allData->links() !!}

                                {{-- </div> --}}
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

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<script>
    $(document).ready(function () {

        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();
            // var page = $(this).attr('href').split('page=')[1];
            // getMoreImages(page);
            let page = $(this).attr('href').split('page=')[1];
            studentClassPaginator(page)
        })


        function studentClassPaginator(page) {
            $.ajax({

                url: "/student/class/paginate-data?page=" + page,
                success: function (res) {

                    $('.table-responsive').html(res);
                }
            })
        }



    });

</script> --}}
