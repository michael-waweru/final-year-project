<div class="container">
    <div class="col-12">
        <div class="section-block">
            <h3 class="section-title">My Leases</h3>
        </div>
        <div class="simple-card">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="list" role="tabpanel" aria-labelledby="list">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive ">
                                <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Property Allocated</th>
                                        <th class="text-center">Monthly Rent</th>
                                        <th class="text-center">My Landlord</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">View</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ( $leases as $key => $lease )
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td class="text-center">{{$lease->tenant->fname." ".$lease->tenant->lname }}</td>
                                            <td class="text-center">{{ $lease->name ?? 'Deleted'}}</td>
                                            <td class="text-center">{{ $lease->rent ?? 'Deleted' }}</td>
                                            <td class="text-center"> {{ $lease->landlord->fname." ".$lease->landlord->lname }} </td>
                                            <td class="text-center">
                                                @if ($lease->increment_at)
                                                    <p class="btn badge badge-danger">Expired</p>
                                                @else
                                                    @if ($lease->status)
                                                        <input type="hidden" name="status" value="0">
                                                        <p class="badge badge-success">Active</p>
                                                    @else
                                                        <input type="hidden" name="status" value="1">
                                                        <p class="badge badge-secondary">Inactive</p>
                                                    @endif
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button class="btn badge badge-secondary" onclick="window.open('{{ route('tenant.lease.show',$lease->id)}}', '_blank')"><i class="fas fa-eye"></i> View</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

