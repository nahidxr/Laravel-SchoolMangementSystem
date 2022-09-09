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
            <td><a href="{{ route('student.class.edit',$student->id) }}" class="btn btn-info">Edit</a>
                <a href="{{ route('student.class.delete',$student->id) }}" class="btn btn-danger" id="delete">Delete</a>
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
