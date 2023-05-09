<x-layout title="{{$title}}">

  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{$title}}</h3>
    </div>
    <form method="post" action="{{url('category/store')}}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="title_input">Judul</label>
          <input type="text" class="form-control" name="title" id="title_input" placeholder="Masukan judul" required />
        </div>
      </div>
      <div class="card-footer">
        <a href="{{url('category')}}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</x-layout>