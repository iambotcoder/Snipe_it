<?php

namespace App\Http\Transformers;

use App\Helpers\Helper;
use App\Models\ResearchDetails;
use Illuminate\Database\Eloquent\Collection;

class ResearchDetailsTransformer
{
    public function transformResearchDetails(Collection $researchDetails, $total)
    {
        $array = [];
        foreach ($researchDetails as $researchDetail) {
            $array[] = self::transformResearchDetail($researchDetail);
        }

        return (new DatatablesTransformer)->transformDatatables($array,$total);
    }

    public function transformResearchDetail(ResearchDetails $researchDetail)
    {
        // Transform individual research detail data here
        $array = [
            'id' => (int)$researchDetail->id,
            'title' => e($researchDetail->title),
            'authors' => $researchDetail->authors,
            'publication_date' => $researchDetail->publication_date,
            'doi' => $researchDetail->doi,
            'abstract' => $researchDetail->abstract,
            'keywords' => $researchDetail->keywords,
            'file_path' => $researchDetail->file_path,
            'created_at' => $researchDetail->created_at,
            'updated_at' => $researchDetail->updated_at,
            'deleted_at' => $researchDetail->deleted_at,
            'user_id' => $researchDetail->user_id,
            // Add more fields as needed
        ];
        return $array;
    }
}
