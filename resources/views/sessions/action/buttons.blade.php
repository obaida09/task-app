@if (auth()->user()->is_admin)
    <a href="{{ route('session.show', $id) }}" class="btn btn-primary btn-table btn-sm">
        <i class="fa-regular fa-eye"></i>
    </a>
@else
    <a onclick="goToSessionDetail()" class="btn btn-primary btn-table btn-sm">
        NOTE
    </a>
@endif

<a href="{{ route('session.edit', $id) }}" class="btn btn-primary btn-table btn-sm">
    <i class="fa fa-edit"></i>
</a>
<a href="javascript:void(0);" onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-product-category-{{ $id }}').submit(); } else { return false; }" class="btn btn-danger btn-table btn-sm">
    <i class="fa fa-trash"></i>
</a>
</div>
<form action="{{ route('session.destroy', $id) }}" method="post" id="delete-product-category-{{ $id }}" class="d-none">
    @csrf
    @method('DELETE')
</form>