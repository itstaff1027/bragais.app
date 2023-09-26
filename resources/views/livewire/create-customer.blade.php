<div>
    <h1><b>ADD NEW CUSTOMER</b></h1>
    <hr>
    <div class="flex-col">
        @php
        $customerInputList = [
        ['type' => 'text', 'wire_model' => 'first_name', 'placeholder' => 'First Name', 'error' => 'error'],
        ['type' => 'text', 'wire_model' => 'last_name', 'placeholder' => 'Last Name', 'error' => 'error'],
        ['type' => 'email', 'wire_model' => 'email', 'placeholder' => 'E-mail', 'error' => 'error'],
        ['type' => 'number', 'wire_model' => 'mobile_number', 'placeholder' => 'Mobile Number', 'error' => 'error'],
        ['type' => 'text', 'wire_model' => 'city_address', 'placeholder' => 'City Address', 'error' => 'error'],
        ['type' => 'text', 'wire_model' => 'consent', 'placeholder' => 'Consent', 'error' => 'error'],
        ]
        @endphp

        <div class="p-10">
            <div x-data="{ open: false }">
                <button @click="open = ! open"
                    class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 bg-violet-950 text-white rounded-full p-2 mb-2">
                    Add Customer
                </button>
                <form wire:submit.prevent="store">
                    @csrf
                    <ul x-show="open" x-transition.duration.500ms>
                        {{-- NOT WORKING AT @error() --}}
                        @foreach ($customerInputList as $input)
                        <div class="flex-col p-3">
                            <input type={{ $input['type'] }} class="p-2 w-1/2 rounded-lg border-2 border-b-violet-800"
                                wire:model="{{ $input['wire_model'] }}" placeholder="{{ $input['placeholder'] }}">
                            @if($errors->any() && $errors->has($input['wire_model']))
                            <span class="error text-red-600">{{ $errors->first($input['wire_model']) }}</span>
                            @endif
                        </div>
                        @endforeach
                        <div class="flex-col p-3">
                            <button type="submit" class="bg-teal-700 text-white p-2 rounded-full w-40">Add
                                Customer</button>
                        </div>


                </form>
            </div>
        </div>
    </div>
    <hr>


    <h1><b>CUSTOMERS</b></h1>

    <table class="table-auto w-full text-center divide-y-2 divide-violet-400 hover:divide-pink-400">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-mail</th>
                <th>Mobile Number</th>
                <th>City Address</th>
                <th>Consent</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr class="hover:bg-violet-900 hover:text-white odd:bg-gray-200">
                <td class="p-2">{{ $customer->id }}</td>
                <td>{{ $customer->first_name }}</td>
                <td>{{ $customer->last_name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->mobile_number }}</td>
                <td>{{ $customer->city_address }}</td>
                <td>{{ $customer->first_name }}</td>
                <td><button>Update</button><button>Delete</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>