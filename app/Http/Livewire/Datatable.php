<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    /**
     * @var bool
     */
     public $actions = false;

    /**
     * @var array
     */
    public $columns;

    /**
     * @var string
     */
    public $model;

    /**
     * @var
     */
    public $perPage = 10;

    /**
     * @var string
     */
    public $search = '';

    /**
     * @var string
     */
    public $sortBy = 'id';

    /**
     * @var string
     */
    public $sortDirection = 'asc';


    /**
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $paginator = $this->getPaginator();

        return view('livewire.datatable', compact('paginator'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = $this->model::query();

        foreach ($this->columns as $column) {
            $query->orWhere($column, 'like', "%{$this->search}%");
        }

        return $query;
    }

    /**
     * @param $field
     * @return string
     */
    public function sortBy(string $field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginator()
    {
        return $this->query()
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);
    }

    /**
     * @return bool
     */
    public function getEmptyProperty()
    {
        return ! $this->query()->count();
    }

    /**
     * @return int
     */
    public function getCountColumnsProperty()
    {
        return $this->actions ? count($this->columns) + 1 : count($this->columns);
    }

    /**
     * returns to first page on each search
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * returns to first page when the per page is changed
     */
    public function updatingPerPage()
    {
        $this->resetPage();
    }

    /**
     * Fix problem with per page and paginate and remove ?page from url, solving dont return to ?page=1
     * @return array
     */
    public function getFromQueryString()
    {
        return [];
    }
}
