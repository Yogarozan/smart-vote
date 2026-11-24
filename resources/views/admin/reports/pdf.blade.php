
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan SMART VOTE</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #1e293b;
        }

        .header {
            text-align: center;
            border-bottom: 3px solid #1e3a8a;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .header h1 {
            color: #1e3a8a;
            font-size: 22px;
            margin-bottom: 5px;
        }

        .header p {
            margin: 4px;
            color: #64748b;
        }

        h2 {
            color: #1e3a8a;
            font-size: 15px;
            margin-top: 25px;
        }

        .info {
            margin-bottom: 20px;
            line-height: 1.8;
        }

        .statistics {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .statistics td {
            border: 1px solid #cbd5e1;
            padding: 12px;
            text-align: center;
        }

        .statistics strong {
            display: block;
            font-size: 18px;
            color: #1e3a8a;
            margin-bottom: 5px;
        }

        table.results {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
        }

        table.results th {
            background: #1e3a8a;
            color: white;
            padding: 10px;
        }

        table.results td {
            border: 1px solid #cbd5e1;
            padding: 10px;
        }

        .center {
            text-align: center;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            color: #64748b;
            font-size: 9px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>SMART VOTE</h1>
        <p>Sistem Pemungutan Suara Digital</p>
        <p>Laporan Rekapitulasi Hasil Pemilihan</p>
    </div>

    <div class="info">
        <strong>Nama Pemilihan:</strong>
        {{ $election->title }}
        <br>

        <strong>Status:</strong>
        {{ ucfirst($election->status) }}
        <br>

        <strong>Tanggal Laporan:</strong>
        {{ now()->format('d-m-Y H:i') }} WIB
        <br>

        <strong>Keterangan:</strong>
        Data laporan berdasarkan hasil sistem SMART VOTE.
    </div>

    <h2>Statistik Partisipasi Pemilih</h2>

    <table class="statistics">
        <tr>
            <td>
                <strong>{{ $totalVoters }}</strong>
                Total Pemilih
            </td>

            <td>
                <strong>{{ $totalParticipations }}</strong>
                Sudah Memilih
            </td>

            <td>
                <strong>{{ $totalNotVoted }}</strong>
                Belum Memilih
            </td>

            <td>
                <strong>{{ $participationPercentage }}%</strong>
                Partisipasi
            </td>
        </tr>
    </table>

    <h2>Rekapitulasi Suara Kandidat</h2>

    <p>
        Total suara masuk:
        <strong>{{ $totalVotes }}</strong>
    </p>

    <table class="results">
        <thead>
            <tr>
                <th width="10%">No.</th>
                <th>Nama Kandidat</th>
                <th width="25%">Jumlah Suara</th>
                <th width="25%">Persentase</th>
            </tr>
        </thead>

        <tbody>
            @forelse($results as $index => $result)
                <tr>
                    <td class="center">
                        {{ $index + 1 }}
                    </td>

                    <td>
                        {{ $result->name }}
                    </td>

                    <td class="center">
                        {{ $result->total_votes }}
                    </td>

                    <td class="center">
                        {{ $result->percentage }}%
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="center">
                        Belum ada data suara.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        SMART VOTE — Laporan dibuat secara otomatis oleh sistem.
        <br>
        Data simulasi/pengujian apabila digunakan untuk keperluan demonstrasi.
    </div>

</body>
</html>
