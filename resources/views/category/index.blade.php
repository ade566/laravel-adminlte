<x-layout title="Kategori">

  <div class="card">
    <div class="card-header border-0 mb-1">
      <a href="{{url('category/add')}}" class="btn btn-primary">
        Tambah
      </a>
    </div>

    <div class="card-body pt-0">
      <div class="table-responsive">
        <table class="table table-bordered table-hover text-nowrap">
          <thead>
            <tr>
              <th>Judul</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($collection as $item)
              <tr>
                <td>{{$item->title}}</td>
                <td>
                  <div class="d-flex">

                    <a href="{{url('category/edit/'.$item->id)}}" class="btn btn-warning btn-sm mr-2">Edit</a>

                    <form action="{{url('category/delete')}}" method="post">
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