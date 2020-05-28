<?php

namespace Modules\Miles\Http\Controllers;

use Auth;
use App\Http\Controllers\BaseController;
use App\Services\DatatableService;
use Modules\Miles\Datatables\MilesDatatable;
use Modules\Miles\Repositories\MilesRepository;
use Modules\Miles\Http\Requests\MilesRequest;
use Modules\Miles\Http\Requests\CreateMilesRequest;
use Modules\Miles\Http\Requests\UpdateMilesRequest;

class MilesController extends BaseController
{
    protected $MilesRepo;
    //protected $entityType = 'miles';

    public function __construct(MilesRepository $milesRepo)
    {
        //parent::__construct();

        $this->milesRepo = $milesRepo;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('list_wrapper', [
            'entityType' => 'miles',
            'datatable' => new MilesDatatable(),
            'title' => mtrans('miles', 'miles_list'),
        ]);
    }

    public function datatable(DatatableService $datatableService)
    {
        $search = request()->input('sSearch');
        $userId = Auth::user()->filterId();

        $datatable = new MilesDatatable();
        $query = $this->milesRepo->find($search, $userId);

        return $datatableService->createDatatable($datatable, $query);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(MilesRequest $request)
    {
        $data = [
            'miles' => null,
            'method' => 'POST',
            'url' => 'miles',
            'title' => mtrans('miles', 'new_miles'),
        ];

        return view('miles::edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateMilesRequest $request)
    {
        $miles = $this->milesRepo->save($request->input());

        return redirect()->to($miles->present()->editUrl)
            ->with('message', mtrans('miles', 'created_miles'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(MilesRequest $request)
    {
        $miles = $request->entity();

        $data = [
            'miles' => $miles,
            'method' => 'PUT',
            'url' => 'miles/' . $miles->public_id,
            'title' => mtrans('miles', 'edit_miles'),
        ];

        return view('miles::edit', $data);
    }

    /**
     * Show the form for editing a resource.
     * @return Response
     */
    public function show(MilesRequest $request)
    {
        return redirect()->to("miles/{$request->miles}/edit");
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateMilesRequest $request)
    {
        $miles = $this->milesRepo->save($request->input(), $request->entity());

        return redirect()->to($miles->present()->editUrl)
            ->with('message', mtrans('miles', 'updated_miles'));
    }

    /**
     * Update multiple resources
     */
    public function bulk()
    {
        $action = request()->input('action');
        $ids = request()->input('public_id') ?: request()->input('ids');
        $count = $this->milesRepo->bulk($ids, $action);

        return redirect()->to('miles')
            ->with('message', mtrans('miles', $action . '_miles_complete'));
    }
}
