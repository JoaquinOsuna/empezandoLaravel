 
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titulo</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title',$post->title)}}">

            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            
        </div>
        <div class="mb-3">
            <label for="url_clean" class="form-label">Url limpia</label>
            <input type="text" name="url_clean" id="url_clean" class="form-control" value="{{ old('url_clean',$post->url_clean)}}"x>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Categorias</label>
            <select name="category_id"  id= "category_id" class="form-control">
                @foreach ($categories as $title => $id)
                    <option {{ $post->category_id== $id ? "selected ='selected'" : ''}} value="{{ $id }}">{{ $title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="posted" class="form-label">Posted</label>
            <select name="posted"  id= "posted" class="form-control">
               @include('dashboard.partials.option_yes-not',['val' => $post->posted])
            </select>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenido</label>
        <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ old('content', $post->content)}}</textarea>
        </div>
        <div class="col-auto">
            <input type="submit" class="btn btn-primary" value="Enviar">
        </div>

