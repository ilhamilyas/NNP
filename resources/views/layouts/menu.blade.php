<li class="{{ Request::is('dataMahasiswas*') ? 'active' : '' }}">
    <a href="{!! route('dataMahasiswas.index') !!}"><i class="fa fa-edit"></i><span>Data Mahasiswas</span></a>
</li>

<li class="{{ Request::is('mahasiswas*') ? 'active' : '' }}">
    <a href="{!! route('mahasiswas.index') !!}"><i class="fa fa-edit"></i><span>Mahasiswas</span></a>
</li>

