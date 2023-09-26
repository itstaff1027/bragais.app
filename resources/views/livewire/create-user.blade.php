<div>
    <h1><b>ADD NEW USER</b></h1>
    <hr>
    <div class="flex-col">
        <form wire:submit.prevent="store">
            @csrf
            <div class="flex-col p-3">
                <input type="text" class="p-2 w-1/2 rounded-lg border-2 border-b-violet-800" wire:model="name"
                    placeholder="Name">
                @error('name') <span class="error text-red-600">{{ $message }}</span> @enderror
            </div>
            <div class="flex-col p-3">
                <input type="email" class="p-2 w-1/2 rounded-lg border-2 border-b-violet-800" wire:model="email"
                    placeholder="Email">
                @error('email') <span class="error text-red-600">{{ $message }}</span> @enderror
            </div>
            <div class="flex-col p-3">
                <input type="password" class="p-2 w-1/2 rounded-lg border-2 border-b-violet-800" wire:model="password"
                    placeholder="Password">
                @error('password') <span class="error text-red-600">{{ $message }}</span> @enderror
            </div>
            <div class="flex-col p-3">
                <button type="submit" class="bg-teal-700 text-white p-2 rounded-full w-40">Add User</button>
            </div>

        </form>
    </div>
    <hr>


    <h1><b>USERS</b></h1>

    <table class="table-auto w-full text-center divide-y-2 divide-violet-400 hover:divide-pink-400">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="hover:bg-violet-900 hover:text-white odd:bg-gray-200">
                <td class="p-2">{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>