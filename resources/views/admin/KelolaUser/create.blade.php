@extends('Partials.AdminDashboard')
@section('title','Tambah User')
@section('content')
<div class="main">
    <div class="card shadow mb-4 my-2 my-3">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                Tambah User
            </h6>
            <a href="{{ route('kelolauser.index') }}" class="btn btn-primary btn-icon-split btn-sm  ml-auto ">
                <span class="icon text-white-50">
                    <i class="fa-solid fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('kelolauser.store') }}" method="POST" >
                @csrf
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" class="form-control" id="name" name="name"required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="npm">NPM (Optional)</label>
                    <input type="text" class="form-control" id="npm" name="npm" >
                </div>

                <div class="form-group">
                    <label for="falkutas">Role</label>
                    <select name="role" id="" class="form-control">
                        <option value="">--Pilih--</option>
                        <option value="falkutas">Falkutas</option>
                        <option value="user">Alumni</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"required>
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
