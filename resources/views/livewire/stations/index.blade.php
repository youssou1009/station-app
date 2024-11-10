
<div wire:ignore.self>

    @if ($currentPage == PAGECREATEFORMSTATION)
        @include('livewire.stations.create')
    @endif

    @if ($currentPage == PAGEEDITFORMSTATION)
        @include('livewire.stations.edit')
    @endif

    @if ($currentPage == PAGELISTSTATION)
        @include('livewire.stations.liste')
    @endif


  {{-- @if ($isBtnAddClicked)
    @include("livewire.stations.create")
  @else   
    @include("livewire.stations.liste")
  @endif --}}
</div>
