<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Repositories\MahasiswaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MahasiswaController extends AppBaseController
{
    /** @var  MahasiswaRepository */
    private $mahasiswaRepository;

    public function __construct(MahasiswaRepository $mahasiswaRepo)
    {
        $this->mahasiswaRepository = $mahasiswaRepo;
    }

    /**
     * Display a listing of the Mahasiswa.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->mahasiswaRepository->pushCriteria(new RequestCriteria($request));
        $mahasiswas = $this->mahasiswaRepository->all();

        return view('mahasiswas.index')
            ->with('mahasiswas', $mahasiswas);
    }

    /**
     * Show the form for creating a new Mahasiswa.
     *
     * @return Response
     */
    public function create()
    {
        return view('mahasiswas.create');
    }

    /**
     * Store a newly created Mahasiswa in storage.
     *
     * @param CreateMahasiswaRequest $request
     *
     * @return Response
     */
    public function store(CreateMahasiswaRequest $request)
    {
        $input = $request->all();

        $mahasiswa = $this->mahasiswaRepository->create($input);

        Flash::success('Mahasiswa saved successfully.');

        return redirect(route('mahasiswas.index'));
    }

    /**
     * Display the specified Mahasiswa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mahasiswa = $this->mahasiswaRepository->findWithoutFail($id);

        if (empty($mahasiswa)) {
            Flash::error('Mahasiswa not found');

            return redirect(route('mahasiswas.index'));
        }

        return view('mahasiswas.show')->with('mahasiswa', $mahasiswa);
    }

    /**
     * Show the form for editing the specified Mahasiswa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mahasiswa = $this->mahasiswaRepository->findWithoutFail($id);

        if (empty($mahasiswa)) {
            Flash::error('Mahasiswa not found');

            return redirect(route('mahasiswas.index'));
        }

        return view('mahasiswas.edit')->with('mahasiswa', $mahasiswa);
    }

    /**
     * Update the specified Mahasiswa in storage.
     *
     * @param  int              $id
     * @param UpdateMahasiswaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMahasiswaRequest $request)
    {
        $mahasiswa = $this->mahasiswaRepository->findWithoutFail($id);

        if (empty($mahasiswa)) {
            Flash::error('Mahasiswa not found');

            return redirect(route('mahasiswas.index'));
        }

        $mahasiswa = $this->mahasiswaRepository->update($request->all(), $id);

        Flash::success('Mahasiswa updated successfully.');

        return redirect(route('mahasiswas.index'));
    }

    /**
     * Remove the specified Mahasiswa from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mahasiswa = $this->mahasiswaRepository->findWithoutFail($id);

        if (empty($mahasiswa)) {
            Flash::error('Mahasiswa not found');

            return redirect(route('mahasiswas.index'));
        }

        $this->mahasiswaRepository->delete($id);

        Flash::success('Mahasiswa deleted successfully.');

        return redirect(route('mahasiswas.index'));
    }
}
