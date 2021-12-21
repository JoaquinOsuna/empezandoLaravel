 
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
            <label for="content" class="form-label">Contenido</label>
        <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ old('content', $post->content)}}</textarea>
        </div>
        <div class="col-auto">
            <input type="submit" class="btn btn-primary" value="Enviar">
        </div>

