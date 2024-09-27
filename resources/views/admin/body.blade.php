
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Tickets Management</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table
              id="basic-datatables"
              class="display table table-striped table-hover"
            >
              <thead>
                <tr> 
                  <th>Created By</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Priority</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>Created By</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($ticket as $key=>$item )
                <tr>
                  <td>{{$item->customer_name}}</td>
                  <td>{{$item->title}}</td>
                  <td>{{$item->description}}</td>
                  <td>{{$item->created_at}}</td>
                  <td>{{$item->priority}}</td>
                  <td>{{$item->status}}</td>
                  <td><a
                    href="{{url('edited',$item->id)}}"
                    class="btn btn-icon btn-round btn-success"
                  >
                    <i class="fa fa-check"></i>
                  </a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>