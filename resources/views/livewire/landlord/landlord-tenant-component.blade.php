<div>
    <div class="col-12">
        <div class="section-block">
            <h3 class="section-title">My Tenants</h3>
        </div>
        <div class="simple-card">
            <ul class="nav nav-tabs" id="myTab5" role="tablist">
                <li class="nav-item">
                    <a class="nav-link border-left-0 active show" id="" data-toggle="tab" href="#list" role="tab"
                        aria-controls="list" aria-selected="true">List</a>
                </li>
                <a href="{{ route('landlord.tenant.add') }}">
                    <button type="button" class="btn btn-primary">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1" />
                            </svg>
                        </span>
                        Add New Tenant
                    </button>
                </a>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="list" role="tabpanel" aria-labelledby="add">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered second">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tenant ID</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Property</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tenants as $index => $tenant)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td> {{ $tenant->id }} </td>
                                    <td> {{ $tenant->tenant->fname.' '.$tenant->tenant->lname }} </td>
                                    <td> {{ $tenant->property->name }} </td>
                                    <td> {{ $tenant->tenant->contact }} </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" onclick="confirm('Are you sure you want to delete this user? This action cannot be undone') || event.stopImmediatePropagation()"wire:click.prevent="deleteUser({{ $tenant->id }})"><i class="fas fa-trash-alt"></i>
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

