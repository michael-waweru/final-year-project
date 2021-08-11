@section('content')
    <div class="container">
        Hi {{ Auth::user()->fname.' '.Auth::user()->lname }}. You are logged in to the Tenant Dashboard
    </div>
@endsection
