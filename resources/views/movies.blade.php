<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Movies</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] p-6 lg:p-8 min-h-screen">
        <main class="max-w-4xl w-full mx-auto">
            <h1 class="mb-4 text-lg font-medium">Daftar Film</h1>

            <div class="bg-white dark:bg-[#161615] rounded-sm shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] p-4">
                <table class="movies-table">
                    <caption class="sr-only">Movie list</caption>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Year</th>
                            <th>Genre</th>
                            <th style="width:140px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($movies ?? [] as $movie)
                            <tr>
                                <td>{{ $movie->original_title ?? '—' }}</td>
                                <td>{{ $movie->release_date ?? '—' }}</td>
                                <td>{{ $movie->genre ?? '—' }}</td>
                                <td>
                                    <a href="#" class="btn-brown">Edit</a>
                                    <a href="#" class="btn-brown btn-brown--ghost">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 text-center text-[#706f6c]">No movies found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </body>
</html> -->
