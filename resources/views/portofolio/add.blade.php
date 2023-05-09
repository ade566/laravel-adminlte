<x-layout title="{{$title}}">

  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{$title}}</h3>
    </div>
    <form method="post" action="{{url('portofolio/store')}}" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="title_input">Kategori</label>
          <select class="form-control" name="category_id" required>
            <option value="">Pilih Kategori</option>
            @foreach ($categories as $data)
            <option value="{{$data->id}}">{{$data->title}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="title_input">Judul</label>
          <input type="text" class="form-control" name="title" id="title_input" placeholder="Masukan judul" required />
        </div>
        <div class="form-group">
          <label for="description">Deskripsi</label>
          <textarea class="form-control" name="description" id="description" placeholder="Masukan Deskripsi" required ></textarea>
        </div>
        <div class="form-group">
          <label for="file_input">Foto Portofolio</label>
          <input type="file" name="file" id="file_input" accept=".jpg, .png, .jpeg, .webp" required />
        </div>
      </div>
      <div class="card-footer">
        <a href="{{url('choose-us')}}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</x-layout>