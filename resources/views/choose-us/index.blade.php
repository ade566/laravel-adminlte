<x-layout title="Keunggulan Kami">

  <div class="card">
    <div class="card-header border-0 mb-1">
      <a href="{{url('choose-us/add')}}" class="btn btn-primary">
        Tambah
      </a>

      <div class="card-tools mr-0">
        <form method="get" style="margin-top:8px;">
          <div class="input-group input-group-sm">
            <input type="text" name="title" class="form-control float-right" placeholder="Cari nama" value="{{$_GET['title'] ?? ''}}" />

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
              <th>Judul</th>
              <th>Overview</th>
              <th>File</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($collection as $item)
              <tr>
                <td>{{$item->title}}</td>
                <td>{{$item->overview ?? '-'}}</td>
                <td>
                  <img src="{{asset($item->file)}}" alt="slider" style="height: 100px; width:auto;" />
                </td>
                <td>
                  <div class="d-flex">

                    <a href="{{url('choose-us/edit/'.$item->id)}}" class="btn btn-warning btn-sm mr-2">Edit</a>

                    <form action="{{url('choose-us/delete')}}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{$item->id}}" />

                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(`Apa anda yakin ingin menghapus data {{$item->title}}?`)">Hapus</button>
                    </form>

                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>

</x-layout>