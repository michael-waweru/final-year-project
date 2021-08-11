<div class="dashboard-main-wrapper">
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Detailed Tenant Information</h5>
                            </div>
                            <div class="card-body">

                                    <div class="row">

                                        <div class="col-md-6">
                                            <table>
                                                <tr>
                                                    <th class="h5">Tenant Information</th>
                                                </tr>
                                                <tr>
                                                    <td>Full Name</td>
                                                    <td>: {{ isset($tenant->fname) ? $tenant->fname : 'null' }} {{ isset($tenant->lname) ? $tenant->lname : 'null' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ID No.</td>
                                                    <td>: {{ isset($tenant->identification_number) ? $tenant->identification_number : 'null' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ID Attachment</td>
                                                    {{-- <td> : <a class="badge badge-secondary" href="{{ url('public/livewire-tmp/'.$tenant->identification_doc) }}" target="_blank">View</a></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>Adress</td>
                                                    <td>: {{ isset($tenant->address) ? $tenant->address : 'null' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Contact</td>
                                                    <td>: {{ isset($tenant->contact) ? $tenant->contact : 'null' }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table>
                                                {{-- <tr>
                                                    <th class="h5">Guarantor</th>
                                                </tr>
                                                <tr>
                                                    <td>Guarantor Name</td>
                                                    <td>: {{ $tenant->guarantor_fname }} {{ $tenant->guarantor_lname }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Guarantor ID No.</td>
                                                    <td>: {{ $tenant->guarantor_id_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Adress</td>
                                                    <td>: {{ $tenant->guarantor_address }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Contact</td>
                                                    <td>: {{ $tenant->guarantor_contact }}</td>
                                                </tr> --}}
                                            </table>
                                        </div>
                                    </div>


                            </div>
                            <button onclick="window.close('_self')" class="btn btn-brand float-right">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



