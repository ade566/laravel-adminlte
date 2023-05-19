<x-layout title="{{$title}}">

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">{{$title}} - {{$nama}}</h3>
      </div>
      
      <form method="post" action="{{url('partner/update')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <input name="id" value="{{$item->id}}" type="hidden">
          
          <div class="form-group">
            <label>File</label>
            <input type="file" class="form-control" name="file">
          </div>
  
          
        </div>
        <div class="card-footer">
          <a href="{{url('partner')}}" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
    
  </x-layout>