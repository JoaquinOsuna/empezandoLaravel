 
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$user->name)}}">      
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Apellido</label>
            <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname',$user->surname)}}">      
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email',$user->email)}}">      
        </div>
        @if ($pasw)
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" value="{{ old('password',$user->password)}}">      
        </div>
        @endif
        <div class="col-auto">
            <input type="submit" class="btn btn-primary" value="Enviar">
        </div>

