<x-layout title="{{$title}}">

  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{$title}}</h3>
    </div>
    <form method="post" action="{{url('users/store')}}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="name_input">Nama</label>
          <input type="text" class="form-control" name="name" id="name_input" placeholder="Masukan nama" required />
        </div>
        <div class="form-group">
          <label for="email_input">Email</label>
          <input type="email" class="form-control" name="email" id="email_input" placeholder="Masukan email" required />
        </div>
        <div class="form-group">
          <label for="input_password">Password</label>
          <input type="password" class="form-control" name="password" id="input_password" placeholder="Masukan password" required />
        </div>
      </div>
      <div class="card-footer">
        <a href="{{url('users')}}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</x-layout>