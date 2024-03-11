<?php

namespace App\Presenters;

/**
 * Class ResearchDetailsPresenter
 */
class ResearchDetailsPresenter extends Presenter
{
    /**
     * Json Column Layout for bootstrap table
     * @return string
     */
    public static function dataTableLayout()
    {
        $layout = [
            [
                'field' => 'id',
                'searchable' => false,
                'sortable' => true,
                'switchable' => true,
                'title' => 'ID',
                'visible' => false,
            ],
            [
                'field' => 'title',
                'searchable' => true,
                'sortable' => true,
                'title' => 'Title',
                'visible' => true,
            ],
            [
                'field' => 'authors',
                'searchable' => true,
                'sortable' => true,
                'title' => 'Authors',
                'visible' => true,
            ],
            [
                'field' => 'publication_date',
                'searchable' => true,
                'sortable' => true,
                'title' => 'Publication Date',
                'visible' => true,
            ],
            [
                'field' => 'doi',
                'searchable' => true,
                'sortable' => true,
                'title' => 'DOI',
                'visible' => false,
            ],
            [
                'field' => 'abstract',
                'searchable' => true,
                'sortable' => false,
                'title' => 'Abstract',
                'visible' => false,
            ],
            [
                'field' => 'keywords',
                'searchable' => true,
                'sortable' => false,
                'title' => 'Keywords',
                'visible' => false,
            ],
            [
                'field' => 'file_path',
                'searchable' => false,
                'sortable' => false,
                'title' => 'File Path',
                'visible' => false,
            ],
            [
                'field' => 'created_at',
                'searchable' => true,
                'sortable' => true,
                'title' => 'Created At',
                'visible' => true,
            ],
            [
                'field' => 'updated_at',
                'searchable' => true,
                'sortable' => true,
                'title' => 'Updated At',
                'visible' => true,
            ],
            [
                'field' => 'deleted_at',
                'searchable' => false,
                'sortable' => false,
                'title' => 'Deleted At',
                'visible' => false,
            ],
            [
                'field' => 'user_id',
                'searchable' => false,
                'sortable' => true,
                'title' => 'User ID',
                'visible' => false,
            ],
        ];

        return json_encode($layout);
    }

    /**
     * Url to view this item.
     * @return string
     */
    public function viewUrl()
    {
        return route('researchdetails.show', $this->id);
    }

    /**
     * Generate html link to this items name.
     * @return string
     */
    public function nameUrl()
    {
        return (string) link_to_route('researchdetails.show', e($this->name), $this->id);
    }
}
