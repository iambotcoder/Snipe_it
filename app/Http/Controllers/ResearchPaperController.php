<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchPaper;

class ResearchPaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // try {
        //     $researchPapers = ResearchPaper::all();
        //     return response()->json($researchPapers);
        // } catch (\Exception $e) {
        //     return response()->json(['message' => 'Failed to fetch research papers.', 'error' => $e->getMessage()], 500);
        // }
        $researchPapers = ResearchPaper::all();
        return view('research_papers.index', compact('researchPapers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('research_papers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'title' => 'required|string',
                'authors' => 'required|string',
                'publication_date' => 'required|date',
            ]);

            // Set a default user ID (e.g., 0 or any other value)
            $defaultUserId = 0;

            // Create a new research paper instance with the validated data
            $researchPaper = new ResearchPaper();
            $researchPaper->title = $validatedData['title'];
            $researchPaper->authors = $validatedData['authors'];
            $researchPaper->publication_date = $validatedData['publication_date'];
            $researchPaper->user_id = $defaultUserId;

            // Save the research paper to the database
            $researchPaper->save();

            // Return a JSON response with the stored research paper and HTTP status code 201 (Created)
            // return response()->json($researchPaper, 201);
            return redirect()->route('researchpapers.index');

        } catch (\Exception $e) {
            // Handle any exceptions that occur during the process
            return response()->json(['message' => 'Failed to store research paper.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // try {
        //     $researchPaper = ResearchPaper::findOrFail($id);
        //     return response()->json($researchPaper);
        // } catch (\Exception $e) {
        //     return response()->json(['message' => 'Research paper not found.', 'error' => $e->getMessage()], 404);
        // }
        try {
            $researchPaper = ResearchPaper::findOrFail($id);
            return view('research_papers.view', compact('researchPaper'));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to fetch research paper.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $researchPaper = ResearchPaper::findOrFail($id);
            return view('research_papers.edit', compact('researchPaper'));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to fetch research paper.', 'error' => $e->getMessage()], 500);
        }
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
        try {
            $researchPaper = ResearchPaper::findOrFail($id);
            
            // Validate the incoming request data
            $validatedData = $request->validate([
                'title' => 'string',
                'authors' => 'string',
                'publication_date' => 'date',
            ]);

            // Update the research paper attributes with the validated data
            $researchPaper->fill($validatedData);
            $researchPaper->save();

            // return response()->json($researchPaper);
            return redirect()->route('researchpapers.index');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update research paper.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $researchPaper = ResearchPaper::findOrFail($id);
            $researchPaper->delete();

            // return response()->json(['message' => 'Research paper deleted successfully']);
            return redirect()->route('researchpapers.index');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete research paper.', 'error' => $e->getMessage()], 500);
        }
    }
}
