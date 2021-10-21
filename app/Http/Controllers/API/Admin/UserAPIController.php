<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\API\Admin\CreateUserAPIRequest;
use App\Http\Requests\API\Admin\UpdateUserAPIRequest;
use App\Models\Admin\User;
use App\Models\Admin\Favorit;
use Illuminate\Support\Facades\Hash;

use App\Repositories\Admin\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Auth;
use Validator;
/**
 * Class UserController
 * @package App\Http\Controllers\API\Admin
 */

class UserAPIController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;
    private $status_code    =        200;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->middleware("auth:api",["except" => ["login","register"]]);
        $this->user = new User;
    }

    /**
     * Display a listing of the User.
     * GET|HEAD /users
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($users->toArray(), 'Users retrieved successfully');
    }

    /**
     * Store a newly created User in storage.
     * POST /users
     *
     * @param CreateUserAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserAPIRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->create($input);

        return $this->sendResponse($user->toArray(), 'User saved successfully');
    }

    /**
     * Display the specified User.
     * GET|HEAD /users/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        return $this->sendResponse($user->toArray(), 'User retrieved successfully');
    }

    /**
     * Update the specified User in storage.
     * PUT/PATCH /users/{id}
     *
     * @param int $id
     * @param UpdateUserAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserAPIRequest $request)
    {
        $input = $request->all();

        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        $user = $this->userRepository->update($input, $id);

        return $this->sendResponse($user->toArray(), 'User updated successfully');
    }

    /**
     * Remove the specified User from storage.
     * DELETE /users/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        $user->delete();

        return $this->sendSuccess('User deleted successfully');
    }


    public function register(Request $request){
        $validator = Validator::make($request->all(),[
        'name' => 'required|string',
        'email' => 'required|string|unique:users',
        'password' => 'required|min:6|confirmed',
        ]);

        if($validator->fails()){
        return response()->json([
        'success' => false,
        'message' => $validator->messages()->toArray()
        ], 500);
        }
        
        $data = [
        "name" => $request->name,
        "email" => $request->email,
        "password" => Hash::make($request->password)
        ];$this->user->create($data);$responseMessage = "Registration Successful";return response()->json([
        'success' => true,
        'message' => $responseMessage
        ], 200);
    }
        
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
        'email' => 'required|string',
        'password' => 'required|min:6',
        ]);if($validator->fails()){
        return response()->json([
        'success' => false,
        'message' => $validator->messages()->toArray()
        ], 500);

        }$credentials = $request->only(["email","password"]);
        $user = User::where('email',$credentials['email'])->first();
    
        if($user){
            if(!auth()->attempt($credentials)){
            $responseMessage = "Invalid username or password";
            return response()->json([
            "success" => false,
            "message" => $responseMessage,
            "error" => $responseMessage
            ], 422);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        $responseMessage = "Login Successful";
        return $this->respondWithToken($accessToken,$responseMessage,auth()->user());
        
        }else{
            $responseMessage = "Sorry, this user does not exist";
            return response()->json([
            "success" => false,
            "message" => $responseMessage,
            "error" => $responseMessage
            ], 422);
        }
        }
        
        public function viewProfile(){
        $responseMessage = "user profile";
        $data = Auth::guard("api")->user();
        return response()->json([
        "success" => true,
        "message" => $responseMessage,
        "data" => $data
        ], 200);
        }
        
        public function ListFavorit(){
            // $user       = \Auth::user();
            $responseMessage = "Favorit company retrieved successfully";
            $user = Auth::guard("api")->user();
            $favorit    = Favorit::where('user_id',$user->id)->get();
    
            return response()->json([
                "success" => true,
                "message" => $responseMessage,
                "data" => $favorit
                ], 200);
        
        }

        
        public function logout(){
        $user = Auth::guard("api")->user()->token();
        $user->revoke();
        $responseMessage = "successfully logged out";
        return response()->json([
        'success' => true,
        'message' => $responseMessage
        ], 200);
        }
        

    public function AddFavorit(Request $request){
        $user = Auth::guard("api")->user();
        $companyId  = $request->companyId;

        Favorit::create(['user_id' => $user->id,'company_id' => $companyId]);

        return $this->sendSuccess('Favorit Company mark successfully');
    }

    public function DeleteFavorit(Request $request){
        $user = Auth::guard("api")->user();
        $companyId  = $request->companyId;
        $favorit    = Favorit::where('company_id',$companyId)->first();
        $favorit->delete();

        return $this->sendSuccess('Favorit Company unmark successfully');
    }


    public function SearchCompany(Request $request){
        $user = Auth::guard("api")->user();
        $name       = $request->name;
        $company    = Company::where('name',$name)->get();

        return $this->sendResponse($company->toArray(), 'Company retrieved successfully');
    }

    
    // public function userSignUp(Request $request) {
    //     $validator              =        Validator::make($request->all(), [
    //         "name"              =>          "required",
    //         "email"             =>          "required|email",
    //         "password"          =>          "required",
    //         "phone"             =>          "required"
    //     ]);

    //     if($validator->fails()) {
    //         return response()->json(["status" => "failed", "message" => "validation_error", "errors" => $validator->errors()]);
    //     }

    //     $userDataArray          =       array(
    //         "name"               =>          $request->name,
    //         "email"              =>          $request->email,
    //         "password"           =>          md5($request->password),
    //         "phone"              =>          $request->phone
    //     );

    //     $user_status            =           User::where("email", $request->email)->first();

    //     if(!is_null($user_status)) {
    //        return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! email already registered"]);
    //     }

    //     $user                   =           User::create($userDataArray);

    //     if(!is_null($user)) {
    //         return response()->json(["status" => $this->status_code, "success" => true, "message" => "Registration completed successfully", "data" => $user]);
    //     }

    //     else {
    //         return response()->json(["status" => "failed", "success" => false, "message" => "failed to register"]);
    //     }
    // }


    // public function userLogin(Request $request) {

    //     $validator          =       Validator::make($request->all(),
    //         [
    //             "email"             =>          "required|email",
    //             "password"          =>          "required"
    //         ]
    //     );

    //     if($validator->fails()) {
    //         return response()->json(["status" => "failed", "validation_error" => $validator->errors()]);
    //     }


    //     // check if entered email exists in db
    //     $email_status       =       User::where("email", $request->email)->first();


    //     // if email exists then we will check password for the same email

    //     if(!is_null($email_status)) {
    //         $password_status    =   User::where("email", $request->email)->where("password", md5($request->password))->first();

    //         // if password is correct
    //         if(!is_null($password_status)) {
    //             $user           =       $this->userDetail($request->email);

    //             return response()->json(["status" => $this->status_code, "success" => true, "message" => "You have logged in successfully", "data" => $user]);
    //         }

    //         else {
    //             return response()->json(["status" => "failed", "success" => false, "message" => "Unable to login. Incorrect password."]);
    //         }
    //     }

    //     else {
    //         return response()->json(["status" => "failed", "success" => false, "message" => "Unable to login. Email doesn't exist."]);
    //     }
    // }

    // public function userDetail($email) {
    //     $user               =       array();
    //     if($email != "") {
    //         $user           =       User::where("email", $email)->first();
    //         return $user;
    //     }
    // }
}
