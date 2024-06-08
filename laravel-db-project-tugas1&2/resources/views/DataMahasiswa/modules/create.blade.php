<div class="card">
    <div class="card-header fw-bold">
        Tambah Data Mahasiswa
    </div>
    <div class="card-body">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <form action="/store" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="email" autocomplete="off" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                id="nama" autocomplete="off" value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="npm" class="form-label">NPM</label>
                <input type="text" name="npm" class="form-control @error('npm') is-invalid @enderror"
                    id="npm" autocomplete="off" value="{{ old('npm') }}">
                @error('npm')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3 mb-3 d-grid gap-2">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>
    </div>
</div>
