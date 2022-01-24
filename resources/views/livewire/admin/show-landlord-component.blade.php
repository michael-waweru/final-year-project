
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>Detailed Landlord Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <tr>
                            <th class="h5">Landlord Information</th>
                        </tr>
                        <table>

                                <tr>
                                    <td>Full Name</td>
                                    {{-- <td>: {{ isset($fname) ? $user->fname : 'null' }} {{ isset($lname) ? $user->lname : 'null' }}</td> --}}
                                    <td>{{ $user->fname}}</td>
                                </tr>
                                <tr>
                                    <td>ID No.</td>
                                    <td>: {{ isset($identification_number) ? $user->identification_number : '0' }}</td>
                                </tr>
                                <tr>
                                    <td>ID Attachment</td>
                                    {{-- <td> : <a class="badge badge-secondary" href="{{ url('public/files/livewiwire-tmp/'.$user->identification_doc) }}" target="_blank">View</a></td> --}}
                                </tr>
                                <tr>
                                    <td>Adress</td>
                                    <td>: {{ isset($address) ? $user->address : '0' }}</td>
                                </tr>
                                <tr>
                                    <td>Contact</td>
                                    <td>: {{ isset($contact) ? $user->contact : '0' }}</td>
                                </tr>

                        </table>
                    </div>
                </div>
            </div>
            <button onclick="window.close('_self')" class="btn btn-brand float-right">Close</button>
        </div>
    </div>
