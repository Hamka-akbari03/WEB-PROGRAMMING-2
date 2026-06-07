<nav class="border-b border-slate-200 bg-white/95 backdrop-blur shadow-sm">
    <div class="mx-auto flex max-w-7xl items-center gap-4 px-4 py-4 sm:px-6 lg:px-8">
        <a href="{{ route('member.index') }}" class="text-lg font-bold tracking-tight text-slate-900">
            Sistem Informasi Perpustakaan PRAK701
        </a>

        <div class="hidden flex-1 items-center gap-2 md:flex">
            <a href="{{ route('member.index') }}" class="rounded-lg px-3 py-2 text-sm font-medium transition {{ request()->routeIs('member.*') ? 'bg-brand-50 text-brand-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">Member</a>
            <a href="{{ route('buku.index') }}" class="rounded-lg px-3 py-2 text-sm font-medium transition {{ request()->routeIs('buku.*') ? 'bg-brand-50 text-brand-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">Buku</a>
            <a href="{{ route('peminjaman.index') }}" class="rounded-lg px-3 py-2 text-sm font-medium transition {{ request()->routeIs('peminjaman.*') ? 'bg-brand-50 text-brand-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">Peminjaman</a>
        </div>

        <div class="ml-auto flex items-center gap-3">
            <span class="hidden text-sm text-slate-500 sm:inline">
                {{ auth()->user()->username ?? 'Pengguna' }}
            </span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-700">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <div class="border-t border-slate-200 bg-white px-4 py-3 md:hidden">
        <div class="mx-auto flex max-w-7xl gap-2 overflow-x-auto sm:px-2">
            <a href="{{ route('member.index') }}" class="whitespace-nowrap rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('member.*') ? 'bg-brand-50 text-brand-700' : 'text-slate-600' }}">Member</a>
            <a href="{{ route('buku.index') }}" class="whitespace-nowrap rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('buku.*') ? 'bg-brand-50 text-brand-700' : 'text-slate-600' }}">Buku</a>
            <a href="{{ route('peminjaman.index') }}" class="whitespace-nowrap rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('peminjaman.*') ? 'bg-brand-50 text-brand-700' : 'text-slate-600' }}">Peminjaman</a>
        </div>
    </div>
</nav>