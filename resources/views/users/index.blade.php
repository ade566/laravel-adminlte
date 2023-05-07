<x-layout title="User Admin">

  <div class="card">
    <div class="card-header border-0 mb-1">
      <a href="{{url('users/add')}}" class="btn btn-primary">
        Tambah
      </a>

      <div class="card-tools mr-0">
        <form method="get" style="margin-top:8px;">
          <div class="input-group input-group-sm">
            <input type="text" name="name" class="form-control float-right" placeholder="Cari nama" value="{{$_GET['name'] ?? ''}}" />

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
                  <div class="d-flex">

                    <a href="{{url('users/edit/'.$item->id)}}" class="btn btn-warning btn-sm mr-2">Edit</a>

                    <form action="{{url('users/delete')}}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{$item->id}}" />

                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(`Apa anda yakin ingin menghapus data {{$item->name}}?`)">Hapus</button>
                    </form>

                  </div>
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