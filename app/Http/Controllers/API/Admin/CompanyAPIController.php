<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateCompanyAPIRequest;
use App\Http\Requests\API\Admin\UpdateCompanyAPIRequest;
use App\Models\Admin\Company;
use App\Repositories\Admin\CompanyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Auth;

/**
 * Class CompanyController
 * @package App\Http\Controllers\API\Admin
 */

class CompanyAPIController extends AppBaseController
{
    /** @var  CompanyRepository */
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepo)
    {
        $this->companyRepository = $companyRepo;
    }

    /**
     * Display a listing of the Company.
     * GET|HEAD /companies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $companies = $this->companyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($companies->toArray(), 'Companies retrieved successfully');
    }

    /**
     * Store a newly created Company in storage.
     * POST /companies
     *
     * @param CreateCompanyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyAPIRequest $request)
    {
        $input = $request->all();

        $company = $this->companyRepository->create($input);

        return $this->sendResponse($company->toArray(), 'Company saved successfully');
    }

    /**
     * Display the specified Company.
     * GET|HEAD /companies/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Company $company */
        $company = $this->companyRepository->find($id);

        if (empty($company)) {
            return $this->sendError('Company not found');
        }

        return $this->sendResponse($company->toArray(), 'Company retrieved successfully');
    }

    /**
     * Update the specified Company in storage.
     * PUT/PATCH /companies/{id}
     *
     * @param int $id
     * @param UpdateCompanyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyAPIRequest $request)
    {
        $input = $request->all();

        /** @var Company $company */
        $company = $this->companyRepository->find($id);

        if (empty($company)) {
            return $this->sendError('Company not found');
        }

        $company = $this->companyRepository->update($input, $id);

        return $this->sendResponse($company->toArray(), 'Company updated successfully');
    }

    /**
     * Remove the specified Company from storage.
     * DELETE /companies/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Company $company */
        $company = $this->companyRepository->find($id);

        if (empty($company)) {
            return $this->sendError('Company not found');
        }

        $company->delete();

        return $this->sendSuccess('Company deleted successfully');
    }


    public function addCompany(Request $request){
        $responseMessage = "Company Added successfully";
        $user = Auth::guard("api")->user();
        $input = $request->all();
        $company = Company::create($input);

        return response()->json([
            "success" => true,
            "message" => $responseMessage,
            "data" => $company
            ], 200);
    }

    public function detailCompany($id){
        $responseMessage = "Company retrieved successfully";
        $user = Auth::guard("api")->user();
        $company    = Company::where('id',$id)->get();

        return response()->json([
            "success" => true,
            "message" => $responseMessage,
            "data" => $company
            ], 200);
    }

    public function SearchCompany(Request $request){
        $responseMessage = "Company retrieved successfully";
        $user = Auth::guard("api")->user();
        $name       = $request->name;
        $company    = Company::where('name',$name)->get();

        return response()->json([
            "success" => true,
            "message" => $responseMessage,
            "data" => $company
            ], 200);
    }

    public function listCompany(){
        $responseMessage = "Company retrieved successfully";
        $company    = Company::get();

        return response()->json([
            "success" => true,
            "message" => $responseMessage,
            "data" => $company
            ], 200);
    }

}
