<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatebrandRequest;
use App\Http\Requests\UpdatebrandRequest;
use App\Repositories\brandRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class brandController extends AppBaseController
{
    /** @var  brandRepository */
    private $brandRepository;

    public function __construct(brandRepository $brandRepo)
    {
      $this->middleware('auth');
        $this->brandRepository = $brandRepo;
    }

    /**
     * Display a listing of the brand.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->brandRepository->pushCriteria(new RequestCriteria($request));
        $brands = $this->brandRepository->all();

        return view('brands.index')
            ->with('brands', $brands);
    }

    /**
     * Show the form for creating a new brand.
     *
     * @return Response
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created brand in storage.
     *
     * @param CreatebrandRequest $request
     *
     * @return Response
     */
    public function store(CreatebrandRequest $request)
    {
        $input = $request->all();

        $brand = $this->brandRepository->create($input);

        Flash::success('Brand saved successfully.');

        return redirect(route('brands.index'));
    }

    /**
     * Display the specified brand.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $brand = $this->brandRepository->findWithoutFail($id);

        if (empty($brand)) {
            Flash::error('Brand not found');

            return redirect(route('brands.index'));
        }

        return view('brands.show')->with('brand', $brand);
    }

    /**
     * Show the form for editing the specified brand.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $brand = $this->brandRepository->findWithoutFail($id);

        if (empty($brand)) {
            Flash::error('Brand not found');

            return redirect(route('brands.index'));
        }

        return view('brands.edit')->with('brand', $brand);
    }

    /**
     * Update the specified brand in storage.
     *
     * @param  int              $id
     * @param UpdatebrandRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebrandRequest $request)
    {
        $brand = $this->brandRepository->findWithoutFail($id);

        if (empty($brand)) {
            Flash::error('Brand not found');

            return redirect(route('brands.index'));
        }

        $brand = $this->brandRepository->update($request->all(), $id);

        Flash::success('Brand updated successfully.');

        return redirect(route('brands.index'));
    }

    /**
     * Remove the specified brand from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $brand = $this->brandRepository->findWithoutFail($id);

        if (empty($brand)) {
            Flash::error('Brand not found');

            return redirect(route('brands.index'));
        }

        $this->brandRepository->delete($id);

        Flash::success('Brand deleted successfully.');

        return redirect(route('brands.index'));
    }
}
