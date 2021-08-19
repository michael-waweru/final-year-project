  @extends('layouts.tenant2')

  @section('content')
    <div class="container">
        <div class="col-12">
            <div class="section-block">
                <h3 class="section-title">Communication Memos</h3>
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
                                            <th class="text-center">Memo Title</th>
                                            <th class="text-center">From</th>
                                            <th class="text-center">View</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ( $memos as $key => $memo )
                                            <tr>
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                <td class="text-center">{{$memo->name }}</td>
                                                <td class="text-center">{{ $memo->title ?? 'Deleted'}}</td>
                                                <td class="text-center"> {{ $memo->landlord->fname." ".$memo->landlord->lname }} </td>
                                                <td class="text-center">
                                                    <button class="btn badge badge-secondary" onclick="window.open('{{ route('tenant.communication.show',$memo->id)}}', '_blank')"><i class="fas fa-eye"></i> View</button>
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
  @endsection
