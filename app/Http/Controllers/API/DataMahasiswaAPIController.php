<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDataMahasiswaAPIRequest;
use App\Http\Requests\API\UpdateDataMahasiswaAPIRequest;
use App\Models\DataMahasiswa;
use App\Repositories\DataMahasiswaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DataMahasiswaController
 * @package App\Http\Controllers\API
 */

class DataMahasiswaAPIController extends AppBaseController
{
    /** @var  DataMahasiswaRepository */
    private $dataMahasiswaRepository;

    public function __construct(DataMahasiswaRepository $dataMahasiswaRepo)
    {
        $this->dataMahasiswaRepository = $dataMahasiswaRepo;
    }

    /**
     * Display a listing of the DataMahasiswa.
     * GET|HEAD /dataMahasiswas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dataMahasiswaRepository->pushCriteria(new RequestCriteria($request));
        $this->dataMahasiswaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $dataMahasiswas = $this->dataMahasiswaRepository->all();

        return $this->sendResponse($dataMahasiswas->toArray(), 'Data Mahasiswas retrieved successfully');
    }

    /**
     * Store a newly created DataMahasiswa in storage.
     * POST /dataMahasiswas
     *
     * @param CreateDataMahasiswaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDataMahasiswaAPIRequest $request)
    {
        $input = $request->all();

        $dataMahasiswas = $this->dataMahasiswaRepository->create($input);

        return $this->sendResponse($dataMahasiswas->toArray(), 'Data Mahasiswa saved successfully');
    }

    /**
     * Display the specified DataMahasiswa.
     * GET|HEAD /dataMahasiswas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DataMahasiswa $dataMahasiswa */
        $dataMahasiswa = $this->dataMahasiswaRepository->findWithoutFail($id);

        if (empty($dataMahasiswa)) {
            return $this->sendError('Data Mahasiswa not found');
        }

        return $this->sendResponse($dataMahasiswa->toArray(), 'Data Mahasiswa retrieved successfully');
    }

    /**
     * Update the specified DataMahasiswa in storage.
     * PUT/PATCH /dataMahasiswas/{id}
     *
     * @param  int $id
     * @param UpdateDataMahasiswaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataMahasiswaAPIRequest $request)
    {
        $input = $request->all();

        /** @var DataMahasiswa $dataMahasiswa */
        $dataMahasiswa = $this->dataMahasiswaRepository->findWithoutFail($id);

        if (empty($dataMahasiswa)) {
            return $this->sendError('Data Mahasiswa not found');
        }

        $dataMahasiswa = $this->dataMahasiswaRepository->update($input, $id);

        return $this->sendResponse($dataMahasiswa->toArray(), 'DataMahasiswa updated successfully');
    }

    /**
     * Remove the specified DataMahasiswa from storage.
     * DELETE /dataMahasiswas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DataMahasiswa $dataMahasiswa */
        $dataMahasiswa = $this->dataMahasiswaRepository->findWithoutFail($id);

        if (empty($dataMahasiswa)) {
            return $this->sendError('Data Mahasiswa not found');
        }

        $dataMahasiswa->delete();

        return $this->sendResponse($id, 'Data Mahasiswa deleted successfully');
    }
}
