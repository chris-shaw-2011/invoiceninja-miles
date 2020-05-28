<?php

namespace Modules\Miles\Http\ApiControllers;

use App\Http\Controllers\BaseAPIController;
use Modules\Miles\Repositories\MilesRepository;
use Modules\Miles\Http\Requests\MilesRequest;
use Modules\Miles\Http\Requests\CreateMilesRequest;
use Modules\Miles\Http\Requests\UpdateMilesRequest;

class MilesApiController extends BaseAPIController
{
    protected $MilesRepo;
    protected $entityType = 'miles';

    public function __construct(MilesRepository $milesRepo)
    {
        parent::__construct();

        $this->milesRepo = $milesRepo;
    }

    /**
     * @SWG\Get(
     *   path="/miles",
     *   summary="List miles",
     *   operationId="listMiless",
     *   tags={"miles"},
     *   @SWG\Response(
     *     response=200,
     *     description="A list of miles",
     *      @SWG\Schema(type="array", @SWG\Items(ref="#/definitions/Miles"))
     *   ),
     *   @SWG\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function index()
    {
        $data = $this->milesRepo->all();

        return $this->listResponse($data);
    }

    /**
     * @SWG\Get(
     *   path="/miles/{miles_id}",
     *   summary="Individual Miles",
     *   operationId="getMiles",
     *   tags={"miles"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="miles_id",
     *     type="integer",
     *     required=true
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="A single miles",
     *      @SWG\Schema(type="object", @SWG\Items(ref="#/definitions/Miles"))
     *   ),
     *   @SWG\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function show(MilesRequest $request)
    {
        return $this->itemResponse($request->entity());
    }




    /**
     * @SWG\Post(
     *   path="/miles",
     *   summary="Create a miles",
     *   operationId="createMiles",
     *   tags={"miles"},
     *   @SWG\Parameter(
     *     in="body",
     *     name="miles",
     *     @SWG\Schema(ref="#/definitions/Miles")
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="New miles",
     *      @SWG\Schema(type="object", @SWG\Items(ref="#/definitions/Miles"))
     *   ),
     *   @SWG\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function store(CreateMilesRequest $request)
    {
        $miles = $this->milesRepo->save($request->input());

        return $this->itemResponse($miles);
    }

    /**
     * @SWG\Put(
     *   path="/miles/{miles_id}",
     *   summary="Update a miles",
     *   operationId="updateMiles",
     *   tags={"miles"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="miles_id",
     *     type="integer",
     *     required=true
     *   ),
     *   @SWG\Parameter(
     *     in="body",
     *     name="miles",
     *     @SWG\Schema(ref="#/definitions/Miles")
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="Updated miles",
     *      @SWG\Schema(type="object", @SWG\Items(ref="#/definitions/Miles"))
     *   ),
     *   @SWG\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function update(UpdateMilesRequest $request, $publicId)
    {
        if ($request->action) {
            return $this->handleAction($request);
        }

        $miles = $this->milesRepo->save($request->input(), $request->entity());

        return $this->itemResponse($miles);
    }


    /**
     * @SWG\Delete(
     *   path="/miles/{miles_id}",
     *   summary="Delete a miles",
     *   operationId="deleteMiles",
     *   tags={"miles"},
     *   @SWG\Parameter(
     *     in="path",
     *     name="miles_id",
     *     type="integer",
     *     required=true
     *   ),
     *   @SWG\Response(
     *     response=200,
     *     description="Deleted miles",
     *      @SWG\Schema(type="object", @SWG\Items(ref="#/definitions/Miles"))
     *   ),
     *   @SWG\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */
    public function destroy(UpdateMilesRequest $request)
    {
        $miles = $request->entity();

        $this->milesRepo->delete($miles);

        return $this->itemResponse($miles);
    }

}
