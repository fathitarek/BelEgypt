<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesettingsRequest;
use App\Http\Requests\UpdatesettingsRequest;
use App\Repositories\settingsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
class settingsController extends AppBaseController
{
    /** @var  settingsRepository */
    private $settingsRepository;

    public function __construct(settingsRepository $settingsRepo)
    {
        $this->settingsRepository = $settingsRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the settings.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->settingsRepository->pushCriteria(new RequestCriteria($request));
        $settings = $this->settingsRepository->all();

        return view('settings.index')
            ->with('settings', $settings);
    }

    /**
     * Show the form for creating a new settings.
     *
     * @return Response
     */
    public function create()
    {
        $brands = DB::table('brands')->lists('name_en','id');
        return view('settings.create', compact('brands'));
    }

    /**
     * Store a newly created settings in storage.
     *
     * @param CreatesettingsRequest $request
     *
     * @return Response
     */
    public function store(CreatesettingsRequest $request)
    {
        $input = $request->all();

        $settings = $this->settingsRepository->create($input);

        Flash::success('Settings saved successfully.');

        return redirect(route('settings.index'));
    }

    /**
     * Display the specified settings.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $settings = $this->settingsRepository->findWithoutFail($id);

        if (empty($settings)) {
            Flash::error('Settings not found');

            return redirect(route('settings.index'));
        }

        return view('settings.show')->with('settings', $settings);
    }

    /**
     * Show the form for editing the specified settings.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $settings = $this->settingsRepository->findWithoutFail($id);
        $brands = DB::table('brands')->lists('name_en','id');
        if (empty($settings)) {
            Flash::error('Settings not found');

            return redirect(route('settings.index'));
        }

        return view('settings.edit')->with('settings', $settings)->with('brands',$brands);
        //  return view('settings.create', compact('brands','settings'));
    }

    /**
     * Update the specified settings in storage.
     *
     * @param  int              $id
     * @param UpdatesettingsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesettingsRequest $request)
    {
        $settings = $this->settingsRepository->findWithoutFail($id);

        if (empty($settings)) {
            Flash::error('Settings not found');

            return redirect(route('settings.index'));
        }

        $settings = $this->settingsRepository->update($request->all(), $id);

        Flash::success('Settings updated successfully.');

        return redirect(route('settings.index'));
    }

    /**
     * Remove the specified settings from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $settings = $this->settingsRepository->findWithoutFail($id);

        if (empty($settings)) {
            Flash::error('Settings not found');

            return redirect(route('settings.index'));
        }

        $this->settingsRepository->delete($id);

        Flash::success('Settings deleted successfully.');

        return redirect(route('settings.index'));
    }
}
