@extends('layouts.admin2')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header mt-10">
                <h3>Detailed Tenant Information</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table>
                            <tr>
                                <td>Full Name</td>
                                <td>: {{ $tenant->fname }} {{ $tenant->lname }}</td>
                            </tr>
                            <tr>
                                <td>ID No.</td>
                                <td>: {{ $tenant->identification_number }}</td>
                            </tr>
                            <tr>
                                <td>ID Attachment</td>
                                <td> : <a class="badge badge-success" href="{{ $tenant->identification_doc }}" target="_blank">View</a></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>: {{ $tenant->address }}</td>
                            </tr>
                            <tr>
                                <td>Contact</td>
                                <td>: {{ $tenant->contact }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table>
                            <tr>
                                <th class="h5">Emergency Contact</th>
                            </tr>
                            <tr>
                                <td>Contact's Name</td>
                                <td>: {{ $tenant->guarantor_fname }} {{ $tenant->guarantor_lname }}</td>
                            </tr>
                            <tr>
                                <td>Contact's ID No.</td>
                                <td>: {{ $tenant->guarantor_id_no }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>: {{ $tenant->guarantor_address }}</td>
                            </tr>

                            <tr>
                                <td>Contact No.</td>
                                <td>: {{ $tenant->guarantor_contact }} </td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
            <button onclick="window.close('_self')" class="btn btn-success float-right">Close</button>
        </div>
    </div>
@endsection
