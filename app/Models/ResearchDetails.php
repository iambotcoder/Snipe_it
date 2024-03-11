<?php

namespace App\Models;

use App\Models\Loggable;
use App\Models\ResearchDetails;
use App\Presenters\Presentable;
use App\Models\Traits\Acceptable;
use App\Models\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ResearchDetails extends Model
{
    use HasFactory, SoftDeletes;

    protected $presenter = \App\Presenters\ResearchDetails::class;

    use Loggable, Presentable;
    use SoftDeletes;
    use Acceptable;

    protected $table = 'research_details';
    
    protected $fillable = [
        'title',
        'authors',
        'publication_date',
        'doi',
        'abstract',
        'keywords',
        'file_path',
        'user_id', // Assuming this is the foreign key for the user
    ];
    
    public $rules = [
        'title'             => 'required',
        'authors'           => 'required',
        'publication_date'  => 'required|date',
        'doi'               => 'nullable',
        'abstract'          => 'nullable',
        'keywords'          => 'nullable',
        'file_path'         => 'nullable',
        'user_id'           => 'nullable|integer',
    ];
    protected $dates = [
        'publication_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    use Searchable;

    /**
     * The attributes that should be included when searching the model.
     *
     * @var array
     */
    protected $searchableAttributes = ['title', 'authors', 'publication_date', 'doi', 'abstract', 'keywords', 'updated_at','deleted_at'];


    // Define relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
