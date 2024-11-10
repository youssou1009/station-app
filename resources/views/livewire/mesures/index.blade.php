
<div wire:ignore.self>

    @if ($currentPage == PAGECREATEMESUREFORM)
        @include('livewire.mesures.create')
    @endif

    @if ($currentPage == PAGEEDITMESUREFORM)
        @include('livewire.mesures.edit')
    @endif

    @if ($currentPage == PAGEMESURELIST)
        @include('livewire.mesures.liste')
    @endif
  {{-- @if ($isBtnAddClicked)
    @include("livewire.mesures.create")
  @else
    @include("livewire.mesures.liste")
  @endif
</div> --}}


<script>
    window.addEventListener("SuccesMessage", event => {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            toast: 'true',
            title: event.detail.message || "Opération éffectué avec succes !",
            showConfirmButton: false,
            timer: 3000
        })
    })
</script>