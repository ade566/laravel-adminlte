<x-layout title="User Admin">

  <div class="card">
    <div class="card-header border-0 mb-1">
      <a href="{{url('users/add')}}" class="btn btn-primary">
        Tambah
      </a>

      <div class="card-tools mr-0">
        <form method="get" style="margin-top:8px;">
          <div class="input-group input-group-sm">
            <input type="text" name="title" class="form-control float-right" placeholder="Cari nama" value="">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search" aria-hidden="true"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="card-body pt-0">
      <div class="table-responsive">
        <table class="table table-bordered table-hover text-nowrap">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($collection as $item)
              <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>

                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{$collection->links('vendor.pagination.simple-bootstrap-4')}}

    </div>
  </div>

</x-layout>