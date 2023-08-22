<x-layout title="{{$title}}">
  <section class="content-header">
    <div class="container-fluid">
      <h1>{{$title}}</h1>
    </div>
  </section>

  <section class="content px-3">
    <div class="card card-primary">
      <form action="{{url('chooseus/_update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <input type="hidden" name="id" value="{{$item->id}}" required />

          <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" value="{{$item->title}}" placeholder="..." class="form-control" required />
          </div>

          <div class="form-group col-md-12">
            <label for="file">Gambar</label>
            <br />
            <input type="file" name="file" id="file" accept=".jpg, .png" />
            <div id="preview">
              <img src="{{asset($item->file)}}" id="preview" style="margin-top: 10px; width:200px; height:auto;">
            </div>
          </div>
        </div>
        <div class="card-footer">
          <a onclick="return history.go(-1)" class="btn btn-default" id="_backButton">Kembali</a>
          <button type="submit" class="btn btn-primary" id="_button">Simpan</button>
        </div>
      </form>
    </div>
  </section>

</x-layout>