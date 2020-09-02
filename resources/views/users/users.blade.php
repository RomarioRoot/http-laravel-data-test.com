<div class="row">
    @foreach($users as $user)
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="{{ $user->avatar }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title border-bottom border-gray pb-2 mb-0">{{ $user->name }}</h5>
                    <p class="card-text">
                        Gender: {{ $user->gender->name }} </br>
                        Age: {{ $user->age }}</br>
                        Height: {{ $user->height }}</br>
                        Country: {{ $user->country->name }}
                    </p>

                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted"><span
                                class="badge badge-{{ $user->color->css_class }}">Hair {{ $user->color->name }}</span>
                        </small>
                        <small class="text-muted"><span
                                class="badge badge-{{ $user->is_active ? "success" : "danger" }}">{{ $user->is_active ? "Active" : "Not Active" }}</span>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{ $users->appends(request()->input())->links() }}
