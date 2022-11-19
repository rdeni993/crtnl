<div class="form-input mt-5">
    <label for="email">
        <small>Full Name</small>
    </label>
    <input class="form-control" type="text" name="name" placeholder="eg. John Doe" required />
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-input mt-4">
    <label for="email">
        <small>Username</small>
    </label>
    <input class="form-control" type="text" name="username" placeholder="eg. johndoe2022" required />
    @error('username')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-input mt-4">
    <label for="email">
        <small>E-mail</small>
    </label>
    <input class="form-control" type="email" name="email" placeholder="eg. username@email.com" required />
    @error('email')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-input mt-4">
    <label for="password">
        <small>Password</small>
    </label>
    <input class="form-control" type="password" name="password" placeholder="******" required />
    @error('password')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-input mt-4">
    <label for="repeat-password">
        <small>Repeat Password</small>
    </label>
    <input class="form-control" type="password" name="password2" placeholder="******" required />
    @error('password2')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>