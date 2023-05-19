<x-layout title="Configuration">

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Configuration</h3>
      </div>
      
      <form method="post" action="{{url('configuration/update')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body row">
          <input name="id" value="{{$item->id}}" type="hidden">
        
          <div class="form-group col-md-6">
            <label>Titla Web</label>
            <input type="text" class="form-control" name="title_web" value="{{$item->title_web}}" required>
          </div>
  
          <div class="form-group col-md-3">
            <label>Logo</label>
            <input type="file" class="form-control" name="logo">
          </div>

          <div class="form-group col-md-3">
            <label>Icon</label>
            <input type="file" class="form-control" name="icon">
          </div>
          
          <div class="form-group col-md-4">
            <label>Email</label>
            <input type="text" class="form-control" name="email" value="{{$item->email}}" required>
          </div>

          <div class="form-group col-md-4">
            <label>Alamat</label>
            <input type="text" class="form-control" name="address" value="{{$item->address}}" required>
          </div>

          <div class="form-group col-md-4">
            <label>Telp</label>
            <input type="text" class="form-control" name="telp" value="{{$item->telp}}" required>
          </div>

          <div class="form-group col-md-4">
            <label>Instagram</label>
            <input type="text" class="form-control" name="ig" value="{{$item->ig}}" required>
          </div>

          <div class="form-group col-md-4">
            <label>Facebook</label>
            <input type="text" class="form-control" name="fb" value="{{$item->fb}}" required>
          </div>

          <div class="form-group col-md-4">
            <label>Twitter</label>
            <input type="text" class="form-control" name="tw" value="{{$item->tw}}" required>
          </div>

          <div class="form-group col-md-6">
            <label>Title About</label>
            <input type="text" class="form-control" name="title_about_us" value="{{$item->title_about_us}}" required>
          </div>

          <div class="form-group col-md-6">
            <label>Overview About</label>
            <input type="text" class="form-control" name="overview_about_us" value="{{$item->overview_about_us}}" required>
          </div>
          
          <div class="form-group col-md-12">
            <label>Deskripsi About</label>
            <textarea type="text" class="form-control" name="description_about_us" required>{{$item->description_about_us}}</textarea>
          </div>

        </div>
        <div class="card-footer">
          <a href="{{url('service')}}" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
    
  </x-layout>