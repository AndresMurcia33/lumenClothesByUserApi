<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//General erros
use App\Traits\ApiResponse;
use App\ClotheByUser;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ClotheByUserController extends Controller
{
    use ApiResponse;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    /**
     * Return list of Clothes
     */
    public function index(){
        // $ClothesByUser = ClotheByUser::all();
       $ClothesByUser = ClotheByUser::select(
            'clothe_by_users.id',
            'clothe_by_users.name',
            'clothe_by_users.description',
            'clothe_by_users.price',
            'clothe_by_users.state',
            'clothe_by_users.category_id',
            'clothing_sizes.name as size',
            'clothing_brands.name as type',
            )
            ->Join('clothing_sizes', 'clothe_by_users.clothing_size_id', '=', 'clothing_sizes.id')
            ->Join('clothing_brands', 'clothe_by_users.clothing_brand_id', '=', 'clothing_brands.id')
        ->get();
       return $this->successReponse($ClothesByUser);
    }
    /**
     * Create an instance of Clothe
    */
    public function store(Request $request){

        if($request->isJson())
        {
            $this->validate($request, [
                'name' => 'required|max:255',
                'description' => 'required',
                'price' => 'required|numeric',
                'category_id'=> 'required|numeric' ,
                'clothing_size_id' => 'required|numeric' ,
                'clothing_brand_id'  => 'required|numeric' 
            ]);
            $newCategories = ClotheByUser::Create($request->all());
            return $this->successReponse($newCategories , Response::HTTP_CREATED);
        }else{
             return $this->errorResponse('Request have be in Json',  Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
    /**
     * Return an specific Clothe
     */
    public function show($ClotheByUserIn){
        // $findClotheByUserIn =  ClotheByUser::findOrFail($ClotheByUserIn);
        $findClotheByUserIn = ClotheByUser::select(
                'clothe_by_users.id',
                'clothe_by_users.name',
                'clothe_by_users.description',
                'clothe_by_users.price',
                'clothe_by_users.category_id',
                'clothe_by_users.state',
                'clothing_sizes.name as size',
                'clothing_brands.name as type'
            )
            ->Join('clothing_sizes', 'clothe_by_users.clothing_size_id', '=', 'clothing_sizes.id')
            ->Join('clothing_brands', 'clothe_by_users.clothing_brand_id', '=', 'clothing_brands.id')
            ->where('clothe_by_users.id', $ClotheByUserIn)
        ->get();
        return $this->successReponse($findClotheByUserIn);
    }
    /**
     * Update the information of an existing Clothe
     */
    public function update(Request $request, $ClotheByUserIn){
        $this->validate($request, [
            'name' => 'max:255',
            'description' => 'max:500',
            'price' => 'numeric',
            'category_id'=> 'numeric' ,
            'clothing_size_id' => 'numeric' ,
            'clothing_brand_id'  => 'numeric' 
        ]);

        $ClotheByUserInFind = ClotheByUser::findOrFail($ClotheByUserIn);
        $ClotheByUserInFind->fill($request->all());
        //if change any in data
        if($ClotheByUserInFind->isClean()){
            return  $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $ClotheByUserInFind->save();
        return $this->successReponse($ClotheByUserInFind);
    }
    /**
     * removes and existing ClotheByUserIn
     * change the state
     */
    public function destroy($ClotheByUserIn)
    {
        $ClotheByUserInFind = ClotheByUser::findOrFail($ClotheByUserIn);
        $ClotheByUserInFind->state = false;
        $ClotheByUserInFind->save();
        return $this->successReponse($ClotheByUserInFind);
    }

}
