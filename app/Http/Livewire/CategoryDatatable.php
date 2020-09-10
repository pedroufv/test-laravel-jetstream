<?php

namespace App\Http\Livewire;

class CategoryDatatable extends Datatable
{
    /**
     * @var
     */
    public $perPage = 15;

    /**
     * @var string
     */
    public $sortBy = 'id';

    /**
     * @var string
     */
    public $sortDirection = 'desc';


    /**
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $paginator = $this->getPaginator();

        return view('livewire.category-datatable', compact('paginator'));
    }
}
