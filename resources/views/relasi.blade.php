<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container mx-auto">
        <div class="text-5xl font-bold text-center my-6">Relasi</div>
        <div class="bg-white shadow-md rounded my-6">
            <table class="text-left w-full border">
                <thead class="bg-gray-200 text-center">
                    <tr>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">NIM</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nama</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Wali</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Dosen</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Hobi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($mahasiswa as $item)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->nim }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->nama }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->wali->nama }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $item->dosen->nama }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                <ul>
                                    @foreach ($item->hobi as $hobi)
                                        <li>{{ $hobi->hobi }}</li>
                                    @endforeach
                                </ul>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>