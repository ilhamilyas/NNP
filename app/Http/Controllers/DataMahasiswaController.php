<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDataMahasiswaRequest;
use App\Http\Requests\UpdateDataMahasiswaRequest;
use App\Repositories\DataMahasiswaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DataMahasiswaController extends AppBaseController
{
    /** @var  DataMahasiswaRepository */
    private $dataMahasiswaRepository;

    public function __construct(DataMahasiswaRepository $dataMahasiswaRepo)
    {
        $this->dataMahasiswaRepository = $dataMahasiswaRepo;
    }

    /**
     * Display a listing of the DataMahasiswa.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dataMahasiswaRepository->pushCriteria(new RequestCriteria($request));
        $dataMahasiswas = $this->dataMahasiswaRepository->all();

        return view('data_mahasiswas.index')
            ->with('dataMahasiswas', $dataMahasiswas);
    }

    /**
     * Show the form for creating a new DataMahasiswa.
     *
     * @return Response
     */
    public function create()
    {
        return view('data_mahasiswas.create');
    }

    /**
     * Store a newly created DataMahasiswa in storage.
     *
     * @param CreateDataMahasiswaRequest $request
     *
     * @return Response
     */
    public function store(CreateDataMahasiswaRequest $request)
    {
        $input = $request->all();

        $dataMahasiswa = $this->dataMahasiswaRepository->create($input);

        Flash::success('Data Mahasiswa saved successfully.');

        return redirect(route('dataMahasiswas.index'));
    }

    /**
     * Display the specified DataMahasiswa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataMahasiswa = $this->dataMahasiswaRepository->findWithoutFail($id);

        if (empty($dataMahasiswa)) {
            Flash::error('Data Mahasiswa not found');

            return redirect(route('dataMahasiswas.index'));
        }

        return view('data_mahasiswas.show')->with('dataMahasiswa', $dataMahasiswa);
    }

    /**
     * Show the form for editing the specified DataMahasiswa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataMahasiswa = $this->dataMahasiswaRepository->findWithoutFail($id);

        if (empty($dataMahasiswa)) {
            Flash::error('Data Mahasiswa not found');

            return redirect(route('dataMahasiswas.index'));
        }

        return view('data_mahasiswas.edit')->with('dataMahasiswa', $dataMahasiswa);
    }

    /**
     * Update the specified DataMahasiswa in storage.
     *
     * @param  int              $id
     * @param UpdateDataMahasiswaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataMahasiswaRequest $request)
    {
        $dataMahasiswa = $this->dataMahasiswaRepository->findWithoutFail($id);

        if (empty($dataMahasiswa)) {
            Flash::error('Data Mahasiswa not found');

            return redirect(route('dataMahasiswas.index'));
        }

        $dataMahasiswa = $this->dataMahasiswaRepository->update($request->all(), $id);

        Flash::success('Data Mahasiswa updated successfully.');

        return redirect(route('dataMahasiswas.index'));
    }

    /**
     * Remove the specified DataMahasiswa from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataMahasiswa = $this->dataMahasiswaRepository->findWithoutFail($id);

        if (empty($dataMahasiswa)) {
            Flash::error('Data Mahasiswa not found');

            return redirect(route('dataMahasiswas.index'));
        }

        $this->dataMahasiswaRepository->delete($id);

        Flash::success('Data Mahasiswa deleted successfully.');

        return redirect(route('dataMahasiswas.index'));
    }
}
