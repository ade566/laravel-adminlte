<x-layout title="{{$title}}">

  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{$title}}</h3>
    </div>
    <form method="post" action="{{url('users/update')}}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="name_input">Nama</label>
          <input type="text" class="form-control" name="name" id="name_input" value="{{$item->name}}" placeholder="Masukan nama" required />
        </div>
        <div class="form-group">
          <label for="email_input">Email</label>
          <input type="email" class="form-control" name="email" id="email_input" value="{{$item->email}}" placeholder="Masukan email" required />
        </div>
        <div class="form-group">
          <label for="input_password" class="mb-0">Password</label>
          <p class="mb-1 font-italic">Jika ingin mengubah password, silahkan masukan password baru dibawah.</p>
          <input type="password" class="form-control" name="password" id="input_password" placeholder="Masukan password baru" />
        </div>
      </div>
      <div class="card-footer">
        <input type="hidden" name="id" value="{{$item->id}}" required />

        <a href="{{url('users')}}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</x-layout>