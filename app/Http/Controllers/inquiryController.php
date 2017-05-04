<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateinquiryRequest;
use App\Http\Requests\UpdateinquiryRequest;
use App\Repositories\inquiryRepository;
use App\Repositories\brandRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\inquiry;
use App\Models\brand;

use Excel;
class inquiryController extends AppBaseController
{
    /** @var  inquiryRepository */
    private $inquiryRepository;

    public function __construct(inquiryRepository $inquiryRepo)
    {
        $this->inquiryRepository = $inquiryRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the inquiry.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->inquiryRepository->pushCriteria(new RequestCriteria($request));
        $inquiries = $this->inquiryRepository->all();

        return view('inquiries.index')
            ->with('inquiries', $inquiries);
    }

    /**
     * Show the form for creating a new inquiry.
     *
     * @return Response
     */
    public function create()
    {
        return view('inquiries.create');
    }

    /**
     * Store a newly created inquiry in storage.
     *
     * @param CreateinquiryRequest $request
     *
     * @return Response
     */
    public function store(CreateinquiryRequest $request)
    {
        $input = $request->all();

        $inquiry = $this->inquiryRepository->create($input);

        Flash::success('Inquiry saved successfully.');

        return redirect(route('inquiries.index'));
    }

    /**
     * Display the specified inquiry.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inquiry = $this->inquiryRepository->findWithoutFail($id);

        if (empty($inquiry)) {
            Flash::error('Inquiry not found');

            return redirect(route('inquiries.index'));
        }

        return view('inquiries.show')->with('inquiry', $inquiry);
    }

    /**
     * Show the form for editing the specified inquiry.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inquiry = $this->inquiryRepository->findWithoutFail($id);

        if (empty($inquiry)) {
            Flash::error('Inquiry not found');

            return redirect(route('inquiries.index'));
        }

        return view('inquiries.edit')->with('inquiry', $inquiry);
    }

    /**
     * Update the specified inquiry in storage.
     *
     * @param  int              $id
     * @param UpdateinquiryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinquiryRequest $request)
    {
        $inquiry = $this->inquiryRepository->findWithoutFail($id);

        if (empty($inquiry)) {
            Flash::error('Inquiry not found');

            return redirect(route('inquiries.index'));
        }

        $inquiry = $this->inquiryRepository->update($request->all(), $id);

        Flash::success('Inquiry updated successfully.');

        return redirect(route('inquiries.index'));
    }

    /**
     * Remove the specified inquiry from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inquiry = $this->inquiryRepository->findWithoutFail($id);

        if (empty($inquiry)) {
            Flash::error('Inquiry not found');

            return redirect(route('inquiries.index'));
        }

        $this->inquiryRepository->delete($id);

        Flash::success('Inquiry deleted successfully.');

        return redirect(route('inquiries.index'));
    }

    public function export() {
      $records = inquiry::oldest()->get();
        foreach ($records as $record)
       {
         //return $record['brand_id'];
          $brand_name=brand::findOrFail($record['brand_id']);
    ///  $brand_name=  $this->brandRepository->findWithoutFail($record['brand_id']);
          //return $brand_name;
            $record['brand_name']=$brand_name->name_en;
            //return $record['brand_name'];
        }

         $now=date("Y-m-d");
         Excel::create($now, function($excel) use ($records,$now) {
        $excel->sheet($now, function($sheet) use ($records) {
            $sheet->fromArray($records, null, 'A1', false, true);
        });
    })->download('xls');

                return redirect(route('inquiries.index'));
    }
}
