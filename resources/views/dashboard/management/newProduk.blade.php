@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">New Produk</h1>

    </div>



    {{-- Alert dari Session dari create --}}
    @if (session()->has('success'))
        <div class="alert alert-info col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- Alert dari deleted --}}
    @if (session()->has('deleted'))
        <div class="alert alert-danger col-lg-8" role="alert">
            {{ session('deleted') }}
        </div>
    @endif

    <div class=" col-lg-8">
        <form method="post" action="/createProduk" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Nama Item</label>
                {{-- <div class="form-text">Masukan Judul</div> --}}
                <input type="text" name="namaItem" class="form-control @error('namaItem') is-invalid @enderror"
                    id="title" placeholder="Nama Item..." required autofocus value="{{ old('namaItem') }}">
                @error('namaItem')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                {{-- <div class="form-text">Masukan Judul</div> --}}
                <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"
                    aria-label="Default select example" required>
                    @foreach ($kategori as $category)
                        @if (old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->nama_kategori }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                        @endif
                    @endforeach
                </select>
                @error('category_id')
                    {{ $message }}
                @enderror
            </div>

            <div class="mb-3">
                <label for="netto" class="form-label">Netto</label>
                {{-- <div class="form-text">Masukan Judul</div> --}}
                <input type="text" name="netto" class="form-control @error('netto') is-invalid @enderror"
                    id="netto" placeholder="Netto Item..." required autofocus value="{{ old('netto') }}">
                @error('netto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                {{-- <div class="form-text">Masukan Judul</div> --}}
                <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror"
                    id="harga" placeholder="Harga Item..." required autofocus value="{{ old('harga') }}">
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>

                <img src="" class="img-preview img-fluid mb-3 col-sm-5" style="max-height: 400px;">

                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Category & logic Selected is OLD --}}


            {{-- Excerpt --}}
            <div class="mb-3">
                <label for="y" class="form-label">Deskripsi</label>

                {{-- <div class="form-text">Masukan Judul</div> --}}
                <input id="x" value="{{ old('deskripsi') }}" type="hidden" name="deskripsi" required>
                <trix-editor input="x" id="y" placeholder="Tuliskan Deskripsi disini..."></trix-editor>
                @error('deskripsi')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>



    </div>
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
