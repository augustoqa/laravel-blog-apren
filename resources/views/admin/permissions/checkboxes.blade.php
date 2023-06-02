@foreach($permissions as $id => $name)
    <div class="checkbox">
        <label>
            <input
                name="permissions[]"
                type="checkbox"
                value="{{ $id }}"
                {{ $user->permissions->contains($id) ? 'checked': '' }}>
            {{ $name }}
        </label>
    </div>
@endforeach