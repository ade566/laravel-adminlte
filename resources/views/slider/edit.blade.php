<x-layout title="{{$title}}">

  <x-breadcrumb
    title="{{$title}}"
    :items="[
      [$title, url('sliders')],
      ['Edit']
    ]" />

  <section class="content px-3">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit {{$title}}</h3>
      </div>
      <form class="_form" action="{{url('sliders/_edit')}}" method="post" enctype="multipart/form-data">
        <div class="card-body row">
          <input type="hidden" name="id" value="{{$item->id}}" required>
          <x-form.input div="col-md-8" label="URL" type="url" name="url" placeholder="{{url('')}}" required="off" value="{{$item->url}}" />
          <div class="form-group col-md-4">
            <label>Tukar Urutan</label>
            <select name="urutan" class="form-control">
              @foreach ($collection as $slider)
                <option 
                  value="{{$slider->id}}" 
                  {{$item->id == $slider->id ? 'selected' : ''}}>{{$slider->urutan}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-12">
            <label for="file">Gambar {{$title}}</label>
            <br />
            <input type="file" name="file" id="file" accept=".jpg, .png" />
            <div id="preview">
              <img src="{{asset($item->file)}}" id="preview" style="margin-top: 10px; width:200px; height:auto;">
            </div>
          </div>
          <x-form.checkbox div="col-md-12" label="Tampilkan slider?" name="active" value="yes" id="active" checked="{{($item->active == 'yes') ? 'checked' : ''}}" />
        </div>
        <div class="card-footer">
          <a onclick="return history.go(-1)" class="btn btn-default" id="_backButton">Kembali</a>
          <button type="submit" class="btn btn-primary" id="_button">Simpan</button>
        </div>
      </form>
    </div>
  </section>

  <x-slot name="js">
    <script type="text/javascript" src="{{asset('js/crud/post.js')}}"></script>
  </x-slot>
</x-layout>