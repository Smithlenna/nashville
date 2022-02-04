<form class="deleteForm" onclick="return confirm('Are you sure, you want to delete this item?')" action="{{ $route }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled"><i class="fa fa-trash"></i></button>
</form>
