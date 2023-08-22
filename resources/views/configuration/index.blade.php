<x-layout>
  <section class="content-header">
    <div class="container-fluid">
      <h1>{{$title}}</h1>
    </div>
  </section>

  <section class="content px-3">
    <div class="card card-primary">
      <form action="{{url('configuration/_update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">

          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" value="{{$item->name}}" placeholder="..." class="form-control" required />
          </div>

          <div class="form-group">
            <label>No Telphone</label>
            <input type="text" name="telphone" value="{{$item->telphone}}" placeholder="..." class="form-control" required />
          </div>

          <h4>Tentang Kami</h4>

          <div class="form-group">
            <label>Judul Tentang Kami</label>
            <input type="text" name="title_aboutus" value="{{$item->title_aboutus}}" placeholder="..." class="form-control" required />
          </div>

          <div class="form-group">
            <label>Konten Tentang Kami</label>
            <textarea name="desc_aboutus" placeholder="..." class="form-control" required>{{$item->desc_aboutus}}</textarea>
          </div>

          <div class="form-group">
            <label for="img_aboutus">Gambar AboutUS</label>
            <br />
            <input type="file" name="img_aboutus" id="img_aboutus" accept=".jpg, .png" />
            <div id="preview">
              <img src="{{asset($item->img_aboutus)}}" id="preview" style="margin-top: 10px; width:200px; height:auto;">
            </div>
          </div>
          
          <h4>Layanan Kami</h4>

          <div class="form-group">
            <label>Judul Layanan Kami</label>
            <input type="text" name="title_service" value="{{$item->title_service}}" placeholder="..." class="form-control" required />
          </div>

          <div class="form-group">
            <label>Konten Layanan Kami</label>
            <textarea name="desc_service" placeholder="..." class="form-control" required>{{$item->desc_service}}</textarea>
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