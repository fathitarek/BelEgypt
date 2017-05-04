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

class inquiryFrontController extends AppBaseController
{
    /** @var  inquiryRepository */
    private $inquiryRepository;

    public function __construct(inquiryRepository $inquiryRepo)
    {
        $this->inquiryRepository = $inquiryRepo;
    }

    /**
     * Show the form for creating a new inquiry.
     *
     * @return Response
     */
    public function create(Request $request)
    {
  //  $request=  $request->url;
    //echo "string";
      //return $request;
        return view('kiri.en');
    }
    public function create_ar(Request $request)
    {
    //  $request=  $request->url;
    //echo "string";
      //return $request;
        return view('kiri.ar');
    }



    public function create_lav(Request $request)
    {
  //  $request=  $request->url;
    //echo "string";
      //return $request;
        return view('lavashkiri.en');
    }
    public function create_ar_lav(Request $request)
    {
    //  $request=  $request->url;
    //echo "string";
      //return $request;
        return view('lavashkiri.ar');
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
        $lang     = $request->lang;
        $inquiry = $this->inquiryRepository->create($input);

        Flash::success('Inquiry saved successfully.');

        if($lang == 'ar'){
                return view('thanks',['name' => 'شكرا']);
              }
              if($lang == 'en'){
                return view('thanks',['name' => 'Thanks']);

              }
      //  return redirect(route('inquiries.index'));
    }


}
