<div>
    <div class="p-4 sm:px-12 bg-white border-b border-gray-200">
        <div class="mt-6 text-2xl">
            List
        </div>
        <div class="mt-6 text-gray-500">
            <div class="flex">
                <div class="w-5/6 form-inline">
                    <label for="per-page">{{ __('Per Page') }}:</label>
                    <select wire:model="perPage" id="per-page" class="bg-gray-100">
                        <option>10</option>
                        <option>15</option>
                        <option>25</option>
                    </select>
                </div>
                <div class="w-1/6">
                    <input wire:model.debounce.300ms="search" class="py-1 px-2 bg-gray-100" type="text" placeholder="{{ __('Search...') }}">
                </div>
            </div>
        </div>
        <table class="table flex-grow">
            <thead>
            <tr>
                @foreach($columns as $column)
                    <th class="cursor-pointer py-4 px-2" wire:click="sortBy('{{ $column }}')">
                        {{ __($column) }}
                        <div class="w-2 float-right">
                        @include('includes.sort-icon', ['field' => $column])
                        </div>
                    </th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach ($paginator as $item)
                <tr>
                    @foreach($item->toArray() as $property => $value)
                        @continue(! in_array($property, $columns))
                        <td class="w-1/{{ $this->countColumns }}">{{$value}}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
        <div class="p-6 border-t border-gray-200 md:border-l">
            <div class="ml-0">
                <div class="text-sm text-gray-500">
                    {{ $paginator->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
