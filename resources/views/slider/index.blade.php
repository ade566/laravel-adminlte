<x-layout>
  <section class="content-header">
    <div class="container-fluid">
      <h1>{{$title}}</h1>
    </div>
  </section>

  <section class="content px-3">
    <div class="row">
      <div class="col-md-2">
        <a 
          href="{{url('slider/add')}}" 
          class="btn btn-primary">
          Tambah
        </a>
      </div>
      <div class="col-md-10">
        <div class="card">
          <form method="get">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Judul</label>
                    <input type="text" name="title" placeholder="..." class="form-control" value="{{$_GET['title'] ?? ''}}" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Konten</label>
                    <input type="text" name="content" placeholder="..." class="form-control" value="{{$_GET['content'] ?? ''}}" />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="{{url('slider')}}" class="btn btn-danger">
                Hapus Pencarian
              </a>
              <button type="submit" class="btn btn-primary">
                Cari
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="card mt-3">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-bordered table-hover text-nowrap mb-0">
            <thead>
              <tr>
                <th style="width: 50px">No</th>
                <th>Judul</th>
                <th>Konten</th>
                <th>Gambar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($collection as $index => $item)
                <tr>
                  <td>{{$index + 1}}</td>
                  <td>
                    <a href="{{$item->url}}" target="_blank" rel="noopener noreferrer">
                      {{$item->title}}
                    </a>
                  </td>
                  <td>{{$item->content}}</td>
                  <td>
                    <img src="{{asset($item->file)}}" alt="slider" style="width:100px;" />
                  </td>
                  <td>
                    <a href="{{url('slider/edit/'.$item->id)}}" class="btn btn-sm btn-primary">
                      Edit
                    </a>

                    <form action="{{url('slider/_delete')}}" method="post" class="mt-2">
                      @csrf
                      <input type="hidden" name="id" value="{{$item->id}}">
                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
                        Hapus
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

</x-layout>