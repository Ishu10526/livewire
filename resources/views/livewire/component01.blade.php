<div>

    <form wire:submit="createNewUser" action="">
        <input wire:model="name" type="text" name="username" placeholder="Name">
        @error('name')
            <span>{{ $message }}</span>
        @enderror
        <input wire:model="email" type="email" name="email" placeholder="Email">
        @error('email')
            <span>{{ $message }}</span>
        @enderror
        <input wire:model="password" type="password" name="password" placeholder="Password">
        @error('passwordgit')
            <span>{{ $message }}</span>
        @enderror
        <button>Create User</button>
    </form>

    @foreach ($users as $user)
        <h3>{{ $user->name }}</h3>
    @endforeach
</div>
