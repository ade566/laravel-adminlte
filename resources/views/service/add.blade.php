<x-layout title="{{$title}}">

  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{$title}} - {{$nama}}</h3>
    </div>
    
    <form method="post" action="{{url('service/store')}}" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="title_input">Kategori</label>
          <select class="form-control" name="category_id" required>
            <option>Pilih Kategori</option>
            @foreach($collection as $data)
            <option value="{{$data->id}}">{{$data->title}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Judul</label>
          <input type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
          <label>Overview</label>
          <input type="text" class="form-control" name="overview">
        </div>

        <div class="form-group">
          <label>File</label>
          <input type="file" class="form-control" name="file">
        </div>

        <div class="form-group">
          <label>Deskripsi</label>
          <textarea type="text" class="form-control" name="description"></textarea>
        </div>
      </div>
      <div class="card-footer">
        <a href="{{url('service')}}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
  
</x-layout>