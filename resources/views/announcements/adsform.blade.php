<x-layout>
<div class="container-fluid pt-5 sectionform">

<div class="container py-5 ">
    <div class="row pt-5 h-100 justify-content-center">
        <div class="col-12 col-md-5 ">

            
            <form class="pt-5 mt-5 formwork" method="POST" action="{{route('submitads')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">
                <div class="mb-3 input-group">
                    <input type="text" value="{{old('title')}}" class="form-control" name="title">
                    <label for="exampleText" class="form-label text-white">Cosa vuoi vendere?</label>
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 input-group">
                    <input type="text" value="{{old('description')}}" class="form-control" name="description">
                    <label for="exampleText" class="form-label text-white">Descrizione prodotto</label>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 input-group">
                    <input type="text" value="{{old('price')}}" class="form-control" name="price">
                    <label for="exampleText" class="form-label text-white">Prezzo</label>
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 input-group">
                    {{-- <label for="exampleText" class="form-label text-white">Seleziona la categoria</label> --}}
                    
                    <select name="categoria" class="form-select">
                        <option value="" selected>Seleziona una categoria</option>
                        @foreach($categorie as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                        @endforeach
                    </select>
                    @error('categoria')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-group row">
                        <label for="images" class="col-md-12 col-form-label text-md-right">Immagini</label>
                        <div class="col-md-12">
                        <div class="dropzone" id="drophere"></div>
                        @error('images')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                        </span>
                        @enderror
                        </div>
                </div>
                
                <div class="text-center pt-4">
                    <button type="submit" class="btn btn-ads shadow-sm mt-3">Submit</button>

                </div>
            </form>
        </div>
    </div>
</div>
</div>

</x-layout>