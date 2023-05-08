<x-layout title="{{$title}}">

  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{$title}}</h3>
    </div>
    <form method="post" action="{{url('sliders/store')}}" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="title_input">Judul</label>
          <input type="text" class="form-control" name="title" id="title_input" placeholder="Masukan judul" required />
        </div>
        <div class="form-group">
          <label for="overview_input">Overview</label>
          <input type="text" class="form-control" name="overview" id="overview_input" placeholder="Masukan overview" />
        </div>
        <div class="form-group">
          <label for="file_input">Foto Slider</label>
          <input type="file" name="file" id="file_input" accept=".jpg, .png, .jpeg, .webp" required />
        </div>
      </div>
      <div class="card-footer">
        <a href="{{url('sliders')}}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</x-layout>