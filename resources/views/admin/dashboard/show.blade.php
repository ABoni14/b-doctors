@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ route('admin.index', Auth::user() ) }}" class="btn-doctors button-back my-3">Indietro</a>
    <div class="container py-4 profile">
        <div class="profile-top d-flex justify-content-between align-items-center row">
            <div class=" col-sm-12 col-md-8">
                <div class="d-flex align-items-center">
                    @if (substr($user->photo, 0, 4) != 'http' && $user->photo != null)
                        <img class="mr-3 rounded-circle" src="{{ asset('storage/' . $user->photo) }}"  alt="not-found" width="200px">
                    @elseif (substr($user->photo, 0, 4) === 'http' && $user->photo != null)
                        <img src="{{ $user->photo }}" alt="not-found" width="200px">
                    @elseif (!$user->photo)
                        <img class="mr-3 rounded-circle" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOQAAADdCAMAAACc/C7aAAAAaVBMVEXDw8MAAADGxsaXl5fJycnMzMxSUlKRkZF1dXV5eXnCwsIFBQWlpaV+fn66urqurq5dXV1sbGxMTEyKiopXV1czMzOcnJwaGhqoqKiEhIQlJSUrKysODg5mZmZHR0ezs7M7OzsVFRU5OTmFwHepAAAC+klEQVR4nO3bi1KjMBSAYXIarIbea2uttVXf/yE36Q0qobrITHP0/2Z2Zt2xDP+GQEDMMgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAANQ56dCtY+JcZge9zgzsrXvipGc61EtzLO29KbpKLMx9mkPpI83H410XFiblyGFufy7Ph0lHPnSya/aByFuqRv7sSqchUvwV83k4EHFtt6QhcrwOl4GXZdv9VBApq3CdK/w1c9nykNUQ+XK6pG/abin5SFmWy5Z+u6FMP7K6unttt6cKIqflSE4a9tQd/zRtKflI6ZeRw6Y9deFS2ryl5COzUXkzMWoIcZm45bixUkGkfd6PormyyBMZPxkzaVouKIjM7PAwjtPm/XRP4Rse8/hgaoh0djzdbl9XeePJxc7CUBdmHi/REOkPx3Bb2DTlnOwP6L34vNQReZ3szqffRXRa/oJIcetzpJnksS2pj3T5pPrIqmfr6wL9kbZvynWf/8uuPi21Rzrxa4WijCzMW/0j6iKdV/lSZPH5Ges0V3+4flqi+uV77Ql07QmCtkg7GlcumM4uI0/ZC+UjGe67FpVl+qhWGGw/f0pRpIS99aeWjTtV2rdopBleTktNkZkMwvmzMHf20BCaY42FWV3MXFWR2eZY8ezvpY/N8aF8UhuZz84jtV+Iu/d4YfiGu+oHFUX6e43i1LDODs1FfCT9P8+lXN7piZRxNWOS23nTOB7syvsRPZHZ+qKhv2uckMfBLqelmsjLew1/anlpOlbLwT5vSUeks/2rQVG9U5eSyLC0+f+3JE53XToiRT6+OjhjPjRFunz6dVHM9DAtVURG7zW+ZbAfSw2R0mpCHvi1vFMRabctC/1/zdaKisjTTwnaRIYfhCmIdHbQunF/Rl5J8pEizfca37Pxkzr5yNnXHdfNJPGRHNrRvP9D81HqkbnNO5D2W5K//X1XFyK7kuyby3/iHXTp8rcJVmk2/onfCwEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAALi1f4DsKck70eEzAAAAAElFTkSuQmCC" alt="not-found" width="200px">
                    @endif
                    <div>
                        <h2 class="font-weight-bolder">Dr. {{ $user->first_name }} {{ $user->last_name }}</h2>
                        <h5>
                            @foreach ($user->specializations as $spec)
                                {{ $spec->name }}
                            @endforeach
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 info-doctor">
                <p><strong>Indirizzo:</strong> {{ $user->address }}</p>
                <p><strong>E-Mail:</strong> {{ $user->email }}</p>
                <p><strong>Telefono:</strong> {{ $user->phone }}</p>
                <p><strong>Prestazioni:</strong>
                    @foreach ($user->performances as $perf)
                        {{ $perf->name }}
                    @endforeach
                </p>
            </div>
        </div>

        <div class="profile-bottom mb-5">
            <p><strong>CV</strong></p>
            <p>{{ $user->cv }}</p>
        </div>

        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <a href="{{route("admin.dashboard.edit", Auth::user())}}" class="btn-doctors mr-2  mt-2 ">MODIFICA PROFILO</a>
            <a href="#" class="btn-doctors mt-2">ELIMINA PROFILO</a>

        </div>
</div>




</div>



@endsection

@section('title')
    | {{Auth::user()->first_name}} {{Auth::user()->last_name}}
@endsection
