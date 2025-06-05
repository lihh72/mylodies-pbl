@extends('layouts.app')

@section('title', 'MyLodies - Home')
@section('body_class', 'bg-[#fef8f2] text-[#5a4a3b] font-sans pt-[60px]')

@section('content')
    <!-- Main Content Wrapper -->
    <div class="flex min-h-[calc(100vh-60px)]">
        <!-- Sidebar -->
        <aside class="bg-[#f3e6d3] w-[300px] p-8 flex flex-col items-center shadow-inner">
            @if (Auth::user()->profile_picture)
    <img 
        src="{{ Auth::user()->profile_picture }}" 
        alt="Profile Picture" 
        class="w-[90px] h-[90px] rounded-full object-cover drop-shadow-lg"
    >
@else
    <i class="bx bxs-user-circle text-[90px] text-[#4a4743] drop-shadow-lg"></i>
@endif

            <div class="font-bold mb-2 text-[18px] text-[#4a4743]">
                {{ $user->name ?? 'User' }}
            </div>
            <p class="text-sm text-[#4a4743] mb-6">{{ $user->email }}</p>

            <nav class="w-full text-[15px] mb-10 space-y-2">
                <a href="#" class="block text-[#5a3e1b] py-2 px-4 rounded-md hover:bg-[#e5d6c2] hover:pl-5 transition-all">Rent History</a>
                <a href="#" class="block text-[#5a3e1b] py-2 px-4 rounded-md hover:bg-[#e5d6c2] hover:pl-5 transition-all">Transaction</a>
                <a href="#" class="block bg-[#c4b6a9] text-white font-semibold py-2 px-4 rounded-md shadow-md hover:text-white transition-all">Change Password</a>
                <a href="#" class="block text-[#5a3e1b] py-2 px-4 rounded-md hover:bg-[#e5d6c2] hover:pl-5 transition-all">Settings</a>
            </nav>

            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
</form>

        </aside>

        <!-- Form Section -->
        <main class="flex-grow p-10 flex flex-col">
            <h3 class="font-bold text-[28px] text-[#5a3e1b] mb-6 ml-2 tracking-wide">Change Your Password</h3>

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Password Change Form -->
            <form method="POST" action="{{ route('edit.password') }}"
                class="bg-[#f3e6d3] p-6 rounded-lg w-[90%] max-w-[1200px] mx-auto mt-3 space-y-6">
                @csrf

                <div class="mb-4 flex items-center gap-4">
                    <label for="prev-password" class="w-1/4 text-base font-bold text-[#5a3e1b]">Previous Password</label>
                    <input name="prev_password" type="password" id="prev-password" required
                        class="flex-1 border-2 border-[#8c7b6a] bg-[#f3e6d3] p-2 rounded-lg">
                </div>

                <div class="mb-4 flex items-center gap-4">
                    <label for="new-password" class="w-1/4 text-base font-bold text-[#5a3e1b]">New Password</label>
                    <input name="new_password" type="password" id="new-password" required
                        class="flex-1 border-2 border-[#8c7b6a] bg-[#f3e6d3] p-2 rounded-lg">
                </div>

                <div class="mb-4 flex items-center gap-4">
                    <label for="confirm-password" class="w-1/4 text-base font-bold text-[#5a3e1b]">Confirm New Password</label>
                    <input name="new_password_confirmation" type="password" id="confirm-password" required
                        class="flex-1 border-2 border-[#8c7b6a] bg-[#f3e6d3] p-2 rounded-lg">
                </div>


                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="flex items-center gap-3 px-5 py-3 rounded-full border border-[#a9937f] bg-gradient-to-r from-[#e9d6c3] to-[#a9937f] text-[#5a4a3b] text-sm font-medium transition-all transform hover:scale-105 shadow-lg hover:shadow-2xl focus:outline-none focus:ring-2 focus:ring-[#a9937f] focus:ring-opacity-50">
                        <i class="bx bx-refresh mr-2 text-[20px]"></i> Update Password
                    </button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>
@endsection