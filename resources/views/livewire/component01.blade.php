<div>

    <form wire:submit="createNewUser" action="">
        <input wire:model="name" type="text" name="username" placeholder="Name">
        <input wire:model="email" type="email" name="email" placeholder="Email">
        <input wire:model="password" type="password" name="password" placeholder="Password">
        <button>Create User</button>
    </form>

    @foreach ($users as $user)
        <h3>{{ $user->name }}</h3>
    @endforeach
</div>
