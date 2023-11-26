<div>

    @if (session('success'))
        <span class="font-bold text-white bg-emerald-500 flex justify-center text-3xl">{{ session('success') }}</span>
    @endif

    <form wire:submit="createNewUser" action="">
        <div class="border-4 border-slate-950 flex justify-center align-center">
            <input class="border-4 border-slate-300 m-3 p-2 rounded-lg" wire:model="name" type="text" name="username" placeholder="Name">
            @error('name')
                <span>{{ $message }}</span>
            @enderror
            <input class="border-4 border-slate-300 m-3 p-2 rounded-lg" wire:model="email" type="email" name="email" placeholder="Email">
            @error('email')
                <span>{{ $message }}</span>
            @enderror
            <input class="border-4 border-slate-300 m-3 p-2 rounded-lg" wire:model="password" type="password" name="password" placeholder="Password">
            @error('passwordgit')
                <span>{{ $message }}</span>
            @enderror
            <button class="bg-sky-700 text-white font-semibold  m-3 p-2 rounded-lg">Create User</button>
        </div>
    </form>

    @foreach ($users as $user)
        <h3>{{ $user->name }}</h3>
    @endforeach

    {{ $users->links() }}
</div>
