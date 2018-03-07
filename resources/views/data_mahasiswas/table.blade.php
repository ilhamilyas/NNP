<table class="table table-responsive" id="dataMahasiswas-table">
    <thead>
        <tr>
            <th>Nim</th>
        <th>Nama</th>
        <th>Kelas</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($dataMahasiswas as $dataMahasiswa)
        <tr>
            <td>{!! $dataMahasiswa->nim !!}</td>
            <td>{!! $dataMahasiswa->nama !!}</td>
            <td>{!! $dataMahasiswa->kelas !!}</td>
            <td>
                {!! Form::open(['route' => ['dataMahasiswas.destroy', $dataMahasiswa->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('dataMahasiswas.show', [$dataMahasiswa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('dataMahasiswas.edit', [$dataMahasiswa->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>