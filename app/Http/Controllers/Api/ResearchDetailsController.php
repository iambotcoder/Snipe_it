<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ResearchDetails;
use App\Http\Controllers\Controller;
use App\Http\Transformers\ResearchDetailsTransformer;

class ResearchDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            // return response()->json(["key"=>"value"]);
            // Define the allowed columns for sorting
            $allowedColumns = [
                'id',
                'title',
                'authors',
                'publication_date',
                'doi',
                'abstract',
                'keywords',
                'file_path',
                'created_at',
                'updated_at',
                'deleted_at',
                'user_id'
            ];

            // Select research details along with related entities
            $researchDetails = ResearchDetails::select('research_details.*');
            
            // Apply search filter if provided
            if ($request->filled('search')) {
                $researchDetails = $researchDetails->TextSearch(e($request->input('search')));
            }


            if ($request->filled('title')) {
                $consumables->where('title', '=', $request->input('title'));
            }
    
            if ($request->filled('authors')) {
                $consumables->where('authors', '=', $request->input('authors'));
            }
    
            if ($request->filled('publication_date')) {
                $consumables->where('publication_date', '=', $request->input('publication_date'));
            }
    
            if ($request->filled('keywords')) {
                $consumables->where('keywords','=',$request->input('keywords'));
            }
    
            if ($request->filled('doi')) {
                $consumables->where('doi', '=', $request->input('doi'));
            }
    
            if ($request->filled('abstract')) {
                $consumables->where('abstract', '=', $request->input('abstract'));
            }
            
            if ($request->filled('created_at')) {
                $consumables->where('created_at','=',$request->input('created_at'));
            }
    
            if ($request->filled('updated_at')) {
                $consumables->where('updated_at','=',$request->input('updated_at'));
            }
            // // Apply filters based on request parameters
            // $filters = ['name', 'user_id'];
            // foreach ($filters as $filter) {
            //     if ($request->filled($filter)) {
            //         $researchDetails->where($filter, '=', $request->input($filter));
            //     }
            // }

            // Define offset and limit for pagination
            $offset = ($request->input('offset') > $researchDetails->count()) ? $researchDetails->count() : app('api_offset_value');
            $limit = app('api_limit_value');

            // Define sorting parameters
            $order = $request->input('order') === 'asc' ? 'asc' : 'desc';
            $sortOverride =  $request->input('sort');
            $columnSort = in_array($sortOverride, $allowedColumns) ? $sortOverride : 'created_at';

            // Apply sorting based on request parameters
            switch ($sortOverride) {
                case 'user':
                    $researchDetails = $researchDetails->orderByUser($order);
                    break;
                default:
                    $researchDetails = $researchDetails->orderBy($columnSort, $order);
                    break;
            }

            // Count total results
            $total = $researchDetails->count();

            // Get paginated research details
            $researchDetails = $researchDetails->skip($offset)->take($limit)->get();

            // Transform and return the results
            return (new ResearchDetailsTransformer)->transformResearchDetails($researchDetails, $total);
        }
        catch(Exception $e){
            return response()->json([
                'message' => 'An error occurred',
                'status' => 'error'
            ],500);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json(['res'=>'success']);
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required',
            'authors' => 'required',
            'publication_date' => 'required|date',
            'doi' => 'nullable',
            'abstract' => 'nullable',
            'keywords' => 'nullable',
            'file_path' => 'nullable',
            'user_id' => 'nullable|integer',
        ]);

        // Create a new ResearchDetails instance with the validated data
        $researchDetails = ResearchDetails::create($validatedData);

        // Return a JSON response with the newly created research details
        return response()->json($researchDetails, 201);
    }

    /** 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find the research detail
        $researchDetail = ResearchDetails::findOrFail($id);

        // Return the research detail as JSON response
        return response()->json($researchDetail, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the research detail
        $researchDetail = ResearchDetails::findOrFail($id);

        // Validate incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string',
            'authors' => 'required|string',
            'publication_date' => 'required|date',
            'doi' => 'nullable|string',
            'abstract' => 'nullable|string',
            'keywords' => 'nullable|string',
            'file_path' => 'nullable|string',
            'user_id' => 'required|integer'
        ]);

        // Update the research detail
        $researchDetail->update($validatedData);

        // Return a success response
        return response()->json(['message' => 'Research detail updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the research detail
        $researchDetail = ResearchDetails::findOrFail($id);

        // Soft delete the research detail
        $researchDetail->delete();

        // Return a success response
        return response()->json(['message' => 'Research detail deleted successfully'], 200);
    }
}
